<?php namespace Backend\Widgets;

use Backend;
use October\Rain\Database\Model;
use ApplicationException;

/**
 * ListTree
 *
 * @package october\backend
 * @author Alexey Bobkov, Samuel Georges
 */
class ListTree extends Lists
{
    /**
     * @var bool showTree display parent/child relationships in the list.
     */
    public $showTree = true;

    /**
     * @var bool Expand the tree nodes by default.
     */
    public $treeExpanded = false;

    /**
     * __construct the widget
     * @param \Backend\Classes\Controller $controller
     * @param array $configuration Proactive configuration definition.
     */
    public function __construct($controller, $configuration = [])
    {
        parent::__construct($controller, $configuration);

        // Extend view to include parent
        $parentViewPath = $this->guessViewPathFrom(Lists::class, '/partials');
        $this->addViewPath($parentViewPath, true);
    }

    /**
     * init the widget, called by the constructor and free from its parameters.
     */
    public function init()
    {
        $this->fillFromConfig([
            'treeExpanded',
        ]);

        parent::init();

        $this->showSorting = false;
        $this->showPagination = false;

        $this->validateTree();
    }

    /**
     * @inheritDoc
     */
    protected function loadAssets()
    {
        $this->addJs('/modules/backend/widgets/lists/assets/js/october.list.js', 'core');
    }

    /**
     * prepareVars for display
     */
    public function prepareVars()
    {
        parent::prepareVars();

        $this->vars['showTree'] = $this->showTree;
        $this->vars['treeLevel'] = 0;
    }

    /**
     * useSorting
     */
    protected function useSorting(): bool
    {
        return !$this->showTree;
    }

    /**
     * setSearchTerm
     */
    public function setSearchTerm($term, $resetPagination = false)
    {
        // Hide tree when searching
        $this->showTree = empty($term);

        parent::setSearchTerm($term, $resetPagination);
    }

    /**
     * getRecords returns all the records from the supplied model, after filtering
     * @return Collection
     */
    protected function getRecords()
    {
        if (!$this->showTree) {
            return parent::getRecords();
        }

        // Find records
        $records = $this->prepareQuery()->getNested();

        // Extensibility from parent
        if ($event = $this->fireSystemEvent('backend.list.extendRecords', [&$records])) {
            $records = $event;
        }

        return $this->records = $records;
    }

    /**
     * getTotalColumns calculates the total columns used in the list, including checkboxes
     * and other additions.
     */
    protected function getTotalColumns()
    {
        $total = parent::getTotalColumns();

        if (!$this->showTree) {
            return $total;
        }

        return $total++;
    }

    /**
     * validateTree validates the model and settings if showTree is used
     */
    public function validateTree()
    {
        if (!$this->model->methodExists('getChildren')) {
            throw new ApplicationException(
                'To display list as a tree, the specified model must have a method "getChildren"'
            );
        }

        if (!$this->model->methodExists('getChildCount')) {
            throw new ApplicationException(
                'To display list as a tree, the specified model must have a method "getChildCount"'
            );
        }
    }

    /**
     * Checks if a node (model) is expanded in the session.
     * @param  Model $node
     * @return boolean
     */
    public function isTreeNodeExpanded($node)
    {
        return $this->getSession('tree_node_status_' . $node->getKey(), $this->treeExpanded);
    }

    /**
     * Sets a node (model) to an expanded or collapsed state, stored in the
     * session, then renders the list again.
     * @return string List HTML contents.
     */
    public function onToggleTreeNode()
    {
        $this->putSession('tree_node_status_' . post('node_id'), post('status') ? 0 : 1);

        return $this->onRefresh();
    }
}
