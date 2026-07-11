<form wire:submit="save" class="space-y-12">
    <!-- Hero Section -->
    <div class="space-y-6">
        <flux:heading size="xl">Hero Section Settings</flux:heading>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <flux:input wire:model="hero_badge_text" label="Badge Text" placeholder="e.g. 2026 PROFESSIONAL EDITION" />
            <flux:input wire:model="hero_title" label="Title" placeholder="e.g. The Ultimate Guide to <br />" />
            <flux:input wire:model="hero_highlight" label="Title Highlight" placeholder="e.g. Mexico" />
            <flux:input wire:model="hero_button_text" label="Button Text" placeholder="e.g. Ultimate PVCMX Handbook" />
            <flux:input wire:model="hero_coffee_url" label="Buy Me A Coffee URL" placeholder="e.g. https://buymeacoffee.com/pvcmx" />
            
            <div class="md:col-span-2">
                <flux:textarea wire:model="hero_description" label="Description" placeholder="e.g. Helping You Build Your Future in Mexico" />
            </div>
        </div>

        <flux:separator />
        
        <flux:heading size="md">Hero Bullets</flux:heading>
        <div class="space-y-4">
            @foreach($hero_bullets as $index => $bullet)
                <div class="flex items-center gap-4">
                    <flux:input wire:model="hero_bullets.{{ $index }}" placeholder="e.g. 🏡 Relocation & Retirement" class="flex-1" />
                    <flux:button variant="danger" icon="trash" wire:click="removeBullet({{ $index }})" />
                </div>
            @endforeach
            <flux:button variant="outline" icon="plus" wire:click="addBullet">Add Bullet</flux:button>
        </div>
    </div>

    <flux:separator />

    <!-- Video Section -->
    <div class="space-y-6">
        <flux:heading size="xl">Video Section Settings</flux:heading>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <flux:input wire:model="video_section_label" label="Section Label" placeholder="e.g. Welcome" />
            <flux:input wire:model="video_section_title" label="Section Title" placeholder="e.g. A Message from Klaus" />
            
            <div class="md:col-span-2">
                <flux:textarea wire:model="video_section_description" label="Description" placeholder="e.g. Discover how we can help you navigate your journey to Mexico." />
            </div>
            
            <div class="md:col-span-2">
                <flux:input wire:model="video_embed_url" label="YouTube Embed URL" placeholder="e.g. https://www.youtube.com/embed/..." />
            </div>
        </div>
    </div>

    <flux:separator />

    <!-- About Section -->
    <div class="space-y-6">
        <flux:heading size="xl">About Section Settings</flux:heading>
        
        <div class="grid grid-cols-1 gap-6">
            <flux:input wire:model="about_section_label" label="Section Label" placeholder="e.g. WHY THIS HANDBOOK" />
            <flux:input wire:model="about_section_title" label="Section Title" placeholder="e.g. Practical Guidance from Real Experience" />
            <flux:textarea wire:model="about_section_description" label="Description" />
        </div>

        <flux:separator />
        
        <flux:heading size="md">About Points</flux:heading>
        <div class="space-y-6">
            @foreach($about_points as $index => $point)
                <div class="p-4 border rounded-xl border-slate-200 dark:border-slate-700 space-y-4 relative">
                    <div class="absolute top-4 right-4">
                        <flux:button variant="danger" size="sm" icon="trash" wire:click="removeAboutPoint({{ $index }})" />
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <flux:input wire:model="about_points.{{ $index }}.icon" label="FontAwesome Icon" placeholder="e.g. fa-globe" />
                        <flux:input wire:model="about_points.{{ $index }}.title" label="Point Title" placeholder="e.g. Firsthand Perspective" />
                        <div class="md:col-span-2">
                            <flux:textarea wire:model="about_points.{{ $index }}.desc" label="Description" />
                        </div>
                    </div>
                </div>
            @endforeach
            <flux:button variant="outline" icon="plus" wire:click="addAboutPoint">Add About Point</flux:button>
        </div>
    </div>

    <flux:separator />

    <!-- Author Section -->
    <div class="space-y-6">
        <flux:heading size="xl">Author Section Settings</flux:heading>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <flux:input wire:model="author_section_label" label="Section Label" placeholder="e.g. About the Founder" />
            <flux:input wire:model="author_section_title" label="Author Name" placeholder="e.g. Klaus Sichelschmidt" />
            
            <div class="md:col-span-2 space-y-4">
                <flux:textarea wire:model="author_section_desc_1" label="Paragraph 1" />
                <flux:textarea wire:model="author_section_desc_2" label="Paragraph 2" />
                <flux:textarea wire:model="author_section_desc_3" label="Paragraph 3" />
            </div>
            
            <div class="md:col-span-2">
                <flux:textarea wire:model="author_quote" label="Quote" />
            </div>
        </div>
    </div>

    <flux:separator />

    <!-- Social & Footer -->
    <div class="space-y-6">
        <flux:heading size="xl">Social Links</flux:heading>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <flux:input wire:model="social_facebook_url" label="Facebook URL" placeholder="https://..." />
            <flux:input wire:model="social_instagram_url" label="Instagram URL" placeholder="https://..." />
            <flux:input wire:model="social_twitter_url" label="Twitter URL" placeholder="https://..." />
            <flux:input wire:model="social_linkedin_url" label="LinkedIn URL" placeholder="https://..." />
        </div>

        <flux:separator />
        
        <flux:heading size="xl">Footer Settings</flux:heading>
        <div class="grid grid-cols-1 gap-6">
            <flux:input wire:model="footer_copyright_text" label="Copyright Text" placeholder="e.g. © 2026 PVCMX" />
            <flux:textarea wire:model="footer_description" label="Footer Description" />
        </div>
    </div>
    
    <div class="flex justify-end pt-6">
        <flux:button type="submit" variant="primary">Save Settings</flux:button>
    </div>
</form>
