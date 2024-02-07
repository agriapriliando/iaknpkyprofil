<?php

namespace App\View\Components;

use App\Models\Artikel;
use App\Models\Konten;
use Illuminate\Support\Facades\URL;
use Illuminate\View\Component;
use romanzipp\Seo\Structs\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SeoRender extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct(Request $request)
    {
        $slug = $request->segment(1);
        $sluginfo = $request->segment(2);
        $artikeldt = Artikel::where('slug', $slug)->first();
        if ($artikeldt) {
            $img = url('/asset/img/berita/thumbnails/' . $artikeldt->img);
            seo()->og('url', URL::current());
            seo()->og('image', $img);
            seo()->og('title', $artikeldt->judul);
            seo()->twitter('image', $img);
            seo()->title('IAKN PKY - ' . $artikeldt->judul);
            $stringg = strip_tags($artikeldt->isi);
            $string = str_replace('"', ' ', $stringg);
            seo()->description(Str::limit($string, 500));
        } elseif ($slug == "info") {
            $konten = Konten::where('slug', $sluginfo)->first();
            seo()->description($konten->judul . " IAKN Palangka Raya | IAKNPKY");
            seo()->og('title', 'IAKN Palangka Raya');
            seo()->og('image', 'https://iaknpky.ac.id/asset/img/logo_iaknpky_footer.png');
        } else {
            seo()->description("IAKN Palangka Raya | IAKNPKY");
            seo()->og('title', 'IAKN Palangka Raya');
            seo()->og('image', 'https://iaknpky.ac.id/asset/img/logo_iaknpky_footer.png');
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        seo()->csrfToken();
        seo()->og('site_name', 'Website IAKN Palangka Raya IAKNPKY');
        seo()->og('locale', 'in_ID');
        seo()->og('type', 'website');
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
        seo()->twitter('site', 'Website IAKN Palangka Raya IAKNPKY IAKNP PKY');

        return view('components.seo-render');
    }
}
