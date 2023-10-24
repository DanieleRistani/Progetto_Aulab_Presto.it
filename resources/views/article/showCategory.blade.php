<x-layouts.app :category='$category' title="{{__('ui.categoryarticle')}} - {{ __('ui.' . $category->name) }}" >
    <div class="container-fluid d-flex justify-content-center">
          <livewire:show-category-filter :category='$category'/>
    </div>
</x-layouts.app>
