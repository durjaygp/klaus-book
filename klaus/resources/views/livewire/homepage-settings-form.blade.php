<form wire:submit="save" class="space-y-4" x-data="{ activeTab: 'general' }">
    <!-- General Settings -->
    <div class="border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden bg-white dark:bg-slate-800 shadow-sm">
        <button type="button" @click="activeTab = (activeTab === 'general' ? '' : 'general')" class="w-full px-6 py-4 flex items-center justify-between bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
            <span class="font-semibold text-slate-800 dark:text-white text-lg">General Settings & Navigation</span>
            <i class="fas fa-chevron-down transition-transform duration-200" :class="activeTab === 'general' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="activeTab === 'general'" x-collapse>
            <div class="p-6 space-y-6 border-t border-slate-200 dark:border-slate-700">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <flux:input wire:model="website_title" label="Website Title" placeholder="e.g. Klaus Book - Guide to Mexico" />
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Favicon</label>
                        <div class="flex items-center gap-4">
                            @if ($favicon)
                                <img src="{{ asset($favicon) }}" class="w-10 h-10 object-cover rounded shadow" alt="Favicon">
                            @endif
                            <input type="file" wire:model="new_favicon" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                hover:file:bg-indigo-100
                            "/>
                        </div>
                    </div>
                </div>

                <flux:separator />
                
                <flux:heading size="md">Navigation Menu</flux:heading>
                <div class="space-y-4">
                    @foreach($menu as $index => $item)
                        <div class="flex items-center gap-4">
                            <flux:input wire:model="menu.{{ $index }}.label" placeholder="Link Label (e.g. About)" class="flex-1" />
                            <flux:input wire:model="menu.{{ $index }}.url" placeholder="URL (e.g. #about)" class="flex-1" />
                            <flux:button variant="danger" icon="trash" wire:click="removeMenuItem({{ $index }})" />
                        </div>
                    @endforeach
                    <flux:button variant="outline" icon="plus" wire:click="addMenuItem">Add Menu Item</flux:button>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden bg-white dark:bg-slate-800 shadow-sm">
        <button type="button" @click="activeTab = (activeTab === 'hero' ? '' : 'hero')" class="w-full px-6 py-4 flex items-center justify-between bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
            <span class="font-semibold text-slate-800 dark:text-white text-lg">Hero Section Settings</span>
            <i class="fas fa-chevron-down transition-transform duration-200" :class="activeTab === 'hero' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="activeTab === 'hero'" x-collapse>
            <div class="p-6 space-y-6 border-t border-slate-200 dark:border-slate-700">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">Hero Background Image</label>
                        <div class="flex items-center gap-4">
                            @if ($hero_bg_image)
                                <img src="{{ asset($hero_bg_image) }}" class="w-20 h-20 object-cover rounded shadow" alt="Hero Background">
                            @endif
                            <input type="file" wire:model="new_hero_bg_image" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                hover:file:bg-indigo-100
                            "/>
                        </div>
                    </div>

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
        </div>
    </div>

    <!-- Video Section -->
    <div class="border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden bg-white dark:bg-slate-800 shadow-sm">
        <button type="button" @click="activeTab = (activeTab === 'video' ? '' : 'video')" class="w-full px-6 py-4 flex items-center justify-between bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
            <span class="font-semibold text-slate-800 dark:text-white text-lg">Video Section Settings</span>
            <i class="fas fa-chevron-down transition-transform duration-200" :class="activeTab === 'video' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="activeTab === 'video'" x-collapse>
            <div class="p-6 space-y-6 border-t border-slate-200 dark:border-slate-700">
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
        </div>
    </div>

    <!-- About Section -->
    <div class="border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden bg-white dark:bg-slate-800 shadow-sm">
        <button type="button" @click="activeTab = (activeTab === 'about' ? '' : 'about')" class="w-full px-6 py-4 flex items-center justify-between bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
            <span class="font-semibold text-slate-800 dark:text-white text-lg">About Section Settings</span>
            <i class="fas fa-chevron-down transition-transform duration-200" :class="activeTab === 'about' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="activeTab === 'about'" x-collapse>
            <div class="p-6 space-y-6 border-t border-slate-200 dark:border-slate-700">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-1">About Profile Picture</label>
                        <div class="flex items-center gap-4">
                            @if ($about_profile_picture)
                                <img src="{{ asset($about_profile_picture) }}" class="w-20 h-20 object-cover rounded shadow" alt="About Profile">
                            @endif
                            <input type="file" wire:model="new_about_profile_picture" class="block w-full text-sm text-slate-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-sm file:font-semibold
                                file:bg-indigo-50 file:text-indigo-700
                                hover:file:bg-indigo-100
                            "/>
                        </div>
                    </div>

                    <flux:input wire:model="about_section_label" label="Section Label" placeholder="e.g. WHY THIS HANDBOOK" />
                    <flux:input wire:model="about_section_title" label="Section Title" placeholder="e.g. Practical Guidance from Real Experience" />
                    <div class="md:col-span-2">
                        <flux:textarea wire:model="about_section_description" label="Description" />
                    </div>
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
        </div>
    </div>

    <!-- Author Section -->
    <div class="border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden bg-white dark:bg-slate-800 shadow-sm">
        <button type="button" @click="activeTab = (activeTab === 'author' ? '' : 'author')" class="w-full px-6 py-4 flex items-center justify-between bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
            <span class="font-semibold text-slate-800 dark:text-white text-lg">Author Section Settings</span>
            <i class="fas fa-chevron-down transition-transform duration-200" :class="activeTab === 'author' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="activeTab === 'author'" x-collapse>
            <div class="p-6 space-y-6 border-t border-slate-200 dark:border-slate-700">
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
        </div>
    </div>

    <!-- Social & Footer -->
    <div class="border border-slate-200 dark:border-slate-700 rounded-xl overflow-hidden bg-white dark:bg-slate-800 shadow-sm">
        <button type="button" @click="activeTab = (activeTab === 'social' ? '' : 'social')" class="w-full px-6 py-4 flex items-center justify-between bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
            <span class="font-semibold text-slate-800 dark:text-white text-lg">Social & Footer Settings</span>
            <i class="fas fa-chevron-down transition-transform duration-200" :class="activeTab === 'social' ? 'rotate-180' : ''"></i>
        </button>
        <div x-show="activeTab === 'social'" x-collapse>
            <div class="p-6 space-y-6 border-t border-slate-200 dark:border-slate-700">
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
        </div>
    </div>
    
    <div class="flex justify-end pt-4 sticky bottom-4">
        <flux:button type="submit" variant="primary" class="w-full sm:w-auto shadow-lg">Save All Settings</flux:button>
    </div>
</form>
