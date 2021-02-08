<?php

namespace GarbuzIvan\LaravelAdminPages\Admin;

use App\Models\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class AdminPagesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected function title()
    {
        return __('admin.pages');
    }

    /**
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content->title($this->title())
            ->breadcrumb(['text' => __('admin.pages'), 'url' => route('admin.site.pages.index')])
            ->description($this->description['index'] ?? trans('admin.list'))
            ->body($this->grid());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page());
        $grid->column('')->display(function () use ($grid) {
            $data = [
                'urlEdit' => route('admin.site.pages.edit', $this->id),
            ];
            return view('admin::custom_action', $data)->render();
        });
        $grid->column('id', __('admin.id'));
        $grid->column('name', __('admin.name'))->sortable()->display(function () use ($grid) {
            return '<a href="' . $grid->resource() . '/' . $this->id . '">' . $this->name . '</a>';
        });;
        $grid->column('created_at', __('admin.created_at'))->display(function () {
            return $this->created_at->format('d-m-Y H:i');
        });
        $grid->column('updated_at', __('admin.updated_at'))->display(function () {
            return $this->updated_at->format('d-m-Y H:i');
        });

        $grid->filter(function ($filter) {
            $filter->like('name', __('admin.name'));
        });

        Admin::css('admin/custom.css');

        return $grid;
    }

    /**
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        $Page = Page::findOrFail($id);
        return $content
            ->title($this->title())
            ->breadcrumb(
                ['text' => __('admin.pages'), 'url' => route('admin.site.pages.index')],
                ['text' => $Page->name, 'url' => route('admin.site.pages.show', $Page->id)],
            )
            ->description($this->description['show'] ?? trans('admin.show'))
            ->body($this->detail($Page));
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($Page)
    {
        $show = new Show($Page);

        $show->field('id', __('admin.id'));
        $show->field('name', __('admin.name'));
        $show->field('email', __('admin.email'));
        $show->field('password', __('admin.password'));
        $show->field('created_at', __('admin.created_at'));
        $show->field('updated_at', __('admin.updated_at'));

        return $show;
    }

    /**
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        $Page = Page::findOrFail($id);
        return $content
            ->title($this->title())
            ->breadcrumb(
                ['text' => __('admin.pages'), 'url' => route('admin.site.pages.index')],
                ['text' => $Page->name ?? '', 'url' => route('admin.site.pages.edit', $Page->id)],
            )
            ->description($this->description['edit'] ?? trans('admin.edit'))
            ->body($this->form()->edit($id));
    }

    /**
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->title($this->title())
            ->breadcrumb(
                ['text' => __('admin.pages'), 'url' => 'pages'],
            )
            ->description($this->description['create'] ?? trans('admin.create'))
            ->body($this->form());
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Page());

        $form->text('name', __('admin.name'));
        $form->text('title', __('admin.title'));
        $form->text('keywords', __('admin.keywords'));
        $form->text('descriptions', __('admin.descriptions'));
        $form->ckeditor('text', __('admin.text'));
        $form->text('url', __('admin.url'));
        $form->hidden('active_text', null);

        $form->saving(function (Form $form) {
            $form->active_text = 1;
        });

        return $form;
    }
}
