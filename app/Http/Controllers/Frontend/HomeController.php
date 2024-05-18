<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Benefit;
use App\Models\SectionTitle;
use App\Models\Slider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Collection as SupportCollection;

class HomeController extends Controller
{
    function index(): View
    {
        $sliders = Slider::where('status', 1)->get();
        $sectionTitles = $this->getSectionTitles();
        $benefits = Benefit::where('status', 1)->get();

        return view('frontend.home.index', compact('sliders', 'sectionTitles', 'benefits'));
    }

    function getSectionTitles(): SupportCollection
    {
        $keys = ['benefit_top_title', 'benefit_main_title', 'benefit_sub_title'];

        return SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
    }
}
