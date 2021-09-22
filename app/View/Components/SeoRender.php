<?php

namespace App\View\Components;

use Illuminate\View\Component;
use romanzipp\Seo\Structs\Meta;

class SeoRender extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        seo()->title('IAKN Palangka Raya');
        seo()->description('Kampus Kristen Negeri di Palangka Raya| fb:@iaknpky| insta:@humas_iaknpky| twitt:@iaknpky');
        seo()->csrfToken();
        $banner = url('asset/img/logo_iaknpky-min.png');
        $urlseo = url('');
        seo()->og('title', 'IAKN Palangka Raya');
        seo()->og('site_name', 'Profil IAKN Palangka Raya');
        seo()->og('locale', 'in_ID');
        seo()->og('type', 'website');
        seo()->og('url', $urlseo);
        seo()->og('image', $banner);
        seo()->add(
            Meta::make()
            ->attr('property', 'og:image:width')
            ->attr('content', '250')
        );
        seo()->add(
            Meta::make()
            ->attr('property', 'og:image:height')
            ->attr('content', '250')
        );
        seo()->twitter('card', 'summary_large_image');
        seo()->twitter('site', 'Profil IAKN Palangka Raya');
        seo()->twitter('image', $banner);

        return view('components.seo-render');
    }
}
