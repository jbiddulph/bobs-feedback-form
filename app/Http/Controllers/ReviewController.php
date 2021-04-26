<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function getAverageRating(){
        $averageRating = Review::selectRaw('SUM(rating)/COUNT(id) AS avg_rating')->first()->avg_rating;

        return $averageRating;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Review::latest()->paginate(5);

        return view('reviews.index',compact('data'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required',
            'postCode' => 'required',
            'phoneNumber' => 'required',
            'jobNumber' => 'required',
            'feedback' => 'required',
            'rating' => 'required'
        ]);

        Review::create($request->all());

        return redirect()->route('addreview')
                        ->with('success','Success your form has been submitted!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        return view('reviews.show',compact('review'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view('reviews.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'fullName' => 'required',
            'postCode' => 'required',
            'phoneNumber' => 'required',
            'jobNumber' => 'required',
            'feedback' => 'required',
            'rating' => 'required'
        ]);

        $review->update($request->all());

        return redirect()->route('reviews.index')
                        ->with('success','Review updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('reviews.index')
                        ->with('success','Review deleted successfully');
    }
}
