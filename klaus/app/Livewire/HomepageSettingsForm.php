<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HomepageSetting;
use Flux\Flux;

class HomepageSettingsForm extends Component
{
    use WithFileUploads;

    public $website_title;
    public $favicon;
    public $new_favicon;
    public $hero_bg_image;
    public $new_hero_bg_image;
    public $about_profile_picture;
    public $new_about_profile_picture;
    public $menu = [];

    public $hero_badge_text;
    public $hero_title;
    public $hero_highlight;
    public $hero_description;
    public $hero_bullets = [];
    public $hero_button_text;
    public $hero_coffee_url;
    
    public $video_section_label;
    public $video_section_title;
    public $video_section_description;
    public $video_embed_url;
    
    public $social_facebook_url;
    public $social_instagram_url;
    public $social_twitter_url;
    public $social_linkedin_url;
    
    public $about_section_label;
    public $about_section_title;
    public $about_section_description;
    public $about_points = [];
    
    public $author_section_label;
    public $author_section_title;
    public $author_section_desc_1;
    public $author_section_desc_2;
    public $author_section_desc_3;
    public $author_quote;
    
    public $footer_copyright_text;
    public $footer_description;

    public function mount()
    {
        $settings = HomepageSetting::first() ?? new HomepageSetting();
        
        $this->website_title = $settings->website_title;
        $this->favicon = $settings->favicon;
        $this->hero_bg_image = $settings->hero_bg_image;
        $this->about_profile_picture = $settings->about_profile_picture;
        $this->menu = $settings->menu ?? [];

        $this->hero_badge_text = $settings->hero_badge_text;
        $this->hero_title = $settings->hero_title;
        $this->hero_highlight = $settings->hero_highlight;
        $this->hero_description = $settings->hero_description;
        $this->hero_bullets = $settings->hero_bullets ?? [];
        $this->hero_button_text = $settings->hero_button_text;
        $this->hero_coffee_url = $settings->hero_coffee_url;
        
        $this->video_section_label = $settings->video_section_label;
        $this->video_section_title = $settings->video_section_title;
        $this->video_section_description = $settings->video_section_description;
        $this->video_embed_url = $settings->video_embed_url;
        
        $this->social_facebook_url = $settings->social_facebook_url;
        $this->social_instagram_url = $settings->social_instagram_url;
        $this->social_twitter_url = $settings->social_twitter_url;
        $this->social_linkedin_url = $settings->social_linkedin_url;
        
        $this->about_section_label = $settings->about_section_label;
        $this->about_section_title = $settings->about_section_title;
        $this->about_section_description = $settings->about_section_description;
        $this->about_points = $settings->about_points ?? [];
        
        $this->author_section_label = $settings->author_section_label;
        $this->author_section_title = $settings->author_section_title;
        $this->author_section_desc_1 = $settings->author_section_desc_1;
        $this->author_section_desc_2 = $settings->author_section_desc_2;
        $this->author_section_desc_3 = $settings->author_section_desc_3;
        $this->author_quote = $settings->author_quote;
        
        $this->footer_copyright_text = $settings->footer_copyright_text;
        $this->footer_description = $settings->footer_description;
    }

    public function addMenuItem()
    {
        $this->menu[] = ['label' => '', 'url' => ''];
    }

    public function removeMenuItem($index)
    {
        unset($this->menu[$index]);
        $this->menu = array_values($this->menu);
    }

    public function addBullet()
    {
        $this->hero_bullets[] = '';
    }

    public function removeBullet($index)
    {
        unset($this->hero_bullets[$index]);
        $this->hero_bullets = array_values($this->hero_bullets);
    }
    
    public function addAboutPoint()
    {
        $this->about_points[] = ['icon' => 'fa-star', 'title' => '', 'desc' => ''];
    }
    
    public function removeAboutPoint($index)
    {
        unset($this->about_points[$index]);
        $this->about_points = array_values($this->about_points);
    }

    public function save()
    {
        $settings = HomepageSetting::first() ?? new HomepageSetting();
        
        $settings->website_title = $this->website_title;
        $settings->menu = array_values(array_filter($this->menu, function($item) {
            return !empty($item['label']);
        }));

        // Handle image uploads
        if ($this->new_favicon) {
            $filename = 'favicon_' . time() . '.' . $this->new_favicon->getClientOriginalExtension();
            \Illuminate\Support\Facades\File::copy($this->new_favicon->getRealPath(), public_path('uploads/' . $filename));
            $settings->favicon = 'uploads/' . $filename;
            $this->favicon = $settings->favicon;
            $this->new_favicon = null;
        }

        if ($this->new_hero_bg_image) {
            $filename = 'hero_' . time() . '.' . $this->new_hero_bg_image->getClientOriginalExtension();
            \Illuminate\Support\Facades\File::copy($this->new_hero_bg_image->getRealPath(), public_path('uploads/' . $filename));
            $settings->hero_bg_image = 'uploads/' . $filename;
            $this->hero_bg_image = $settings->hero_bg_image;
            $this->new_hero_bg_image = null;
        }

        if ($this->new_about_profile_picture) {
            $filename = 'about_' . time() . '.' . $this->new_about_profile_picture->getClientOriginalExtension();
            \Illuminate\Support\Facades\File::copy($this->new_about_profile_picture->getRealPath(), public_path('uploads/' . $filename));
            $settings->about_profile_picture = 'uploads/' . $filename;
            $this->about_profile_picture = $settings->about_profile_picture;
            $this->new_about_profile_picture = null;
        }

        $settings->hero_badge_text = $this->hero_badge_text;
        $settings->hero_title = $this->hero_title;
        $settings->hero_highlight = $this->hero_highlight;
        $settings->hero_description = $this->hero_description;
        $settings->hero_bullets = array_values(array_filter($this->hero_bullets));
        $settings->hero_button_text = $this->hero_button_text;
        $settings->hero_coffee_url = $this->hero_coffee_url;
        
        $settings->video_section_label = $this->video_section_label;
        $settings->video_section_title = $this->video_section_title;
        $settings->video_section_description = $this->video_section_description;
        $settings->video_embed_url = $this->video_embed_url;
        
        $settings->social_facebook_url = $this->social_facebook_url;
        $settings->social_instagram_url = $this->social_instagram_url;
        $settings->social_twitter_url = $this->social_twitter_url;
        $settings->social_linkedin_url = $this->social_linkedin_url;
        
        $settings->about_section_label = $this->about_section_label;
        $settings->about_section_title = $this->about_section_title;
        $settings->about_section_description = $this->about_section_description;
        $settings->about_points = array_values(array_filter($this->about_points, function($pt) {
            return !empty($pt['title']);
        }));
        
        $settings->author_section_label = $this->author_section_label;
        $settings->author_section_title = $this->author_section_title;
        $settings->author_section_desc_1 = $this->author_section_desc_1;
        $settings->author_section_desc_2 = $this->author_section_desc_2;
        $settings->author_section_desc_3 = $this->author_section_desc_3;
        $settings->author_quote = $this->author_quote;
        
        $settings->footer_copyright_text = $this->footer_copyright_text;
        $settings->footer_description = $this->footer_description;
        
        $settings->save();
        
        Flux::toast(variant: 'success', text: 'Settings saved successfully.');
    }

    public function render()
    {
        return view('livewire.homepage-settings-form');
    }
}
