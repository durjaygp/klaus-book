<x-layouts::app :title="__('Homepage Settings')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="bg-white dark:bg-zinc-900 border border-neutral-200 dark:border-neutral-700 rounded-xl p-6">
            <livewire:homepage-settings-form />
        </div>
    </div>
</x-layouts::app>
