@if (
    $product->trashed()
)
    <x-utils.form-button
        :action="route('admin.product.restore', $product)"
        method="patch"
        button-class="btn btn-info btn-sm"
        icon="fas fa-sync-alt"
        name="confirm-item"
    >
        @lang('Restore')
    </x-utils.form-button>

    <x-utils.delete-button
        :href="route('admin.product.permanently-delete', $product)"
        :text="__('Permanently Delete')"/>
@else
    <x-utils.view-button :href="route('admin.product.show', $product)"/>
    <x-utils.edit-button :href="route('admin.product.edit', $product)"/>
    <x-utils.delete-button :href="route('admin.product.destroy', $product)"/>
@endif