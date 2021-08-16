@extends('alotfront.layouts.header')
@section('content')
    <section id="small-cover-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 py-2">
                    <p class="mb-2"><span class="badge badge-danger"><i class="fa fa-check-circle"></i> Verified</span> <span class="badge badge-primary">Restaurant</span></p>
                    <p class="mb-1"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></p>
                    <p class="detail-heading-location"><i class="fa fa-map-marker text-primary"></i> 42 Chopta, Uttarakhand</p>
                    <h1 class="site-title pl-0 text-white">Property Name</h1>
                </div>
            </div>
        </div>

    </section>
    <section id="property-detail">
        <div class="container-fluid px-sm-1 mx-auto">
            <div class="row m-0">
                <div class="col-md-2 pt-2">
                    <div class="sticky-top">
                        <div class="list-group mt-4 mb-4">
                            <a href="#images" class="list-group-item list-group-item-action">Images</a>
                            <a href="#description" class="list-group-item list-group-item-action">Description</a>
                            <a href="#feature" class="list-group-item list-group-item-action">Features</a>
                            <a href="#location" class="list-group-item list-group-item-action">Location</a>
                            <a href="#reviews" class="list-group-item list-group-item-action">Reviews</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 pt-2">
                    <h2 class="site-title" >Gallery</h2>
                    <div class=" no-gutters" id="images">
                        <div class="card">
                            <div class="demo">
                                <ul id="lightSlider">
                                    <li data-thumb="assets/images/bg/camp2.jpg"> <img src="assets/images/bg/camp2.jpg" /> </li>
                                    <li data-thumb="assets/images/bg/camp3.jpg"> <img src="assets/images/bg/camp3.jpg" /> </li>
                                    <li data-thumb="assets/images/bg/camp4.jpg"> <img src="assets/images/bg/camp4.jpg" /> </li>
                                    <li data-thumb="assets/images/bg/camp2.jpg"> <img src="assets/images/bg/camp2.jpg" /> </li>
                                    <li data-thumb="assets/images/bg/camp3.jpg"> <img src="assets/images/bg/camp3.jpg" /> </li>
                                    <li data-thumb="assets/images/bg/camp4.jpg"> <img src="assets/images/bg/camp4.jpg" /> </li>
                                    <li data-thumb="assets/images/bg/camp2.jpg"> <img src="assets/images/bg/camp2.jpg" /> </li>
                                    <li data-thumb="assets/images/bg/camp3.jpg"> <img src="assets/images/bg/camp3.jpg" /> </li>
                                    <li data-thumb="assets/images/bg/camp4.jpg"> <img src="assets/images/bg/camp4.jpg" /> </li>
                                    <li data-thumb="assets/images/bg/camp2.jpg"> <img src="assets/images/bg/camp2.jpg" /> </li>
                                    <li data-thumb="assets/images/bg/camp3.jpg"> <img src="assets/images/bg/camp3.jpg" /> </li>
                                    <li data-thumb="assets/images/bg/camp4.jpg"> <img src="assets/images/bg/camp4.jpg" /> </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div id="description" class="mt-4">
                        <h2 class="site-title" >Description</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem voluptatibus animi in quia earum, quisquam assumenda quos, quod eius minus dolores, repellat laboriosam laborum molestiae. Maxime perspiciatis aspernatur natus ipsam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos eaque consequatur laudantium aut, unde eum non veniam tempora odio ut est laborum ipsam minima debitis cum pariatur quo saepe hic.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem voluptatibus animi in quia earum, quisquam assumenda quos, quod eius minus dolores, repellat laboriosam laborum molestiae. Maxime perspiciatis aspernatur natus ipsam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos eaque consequatur laudantium aut, unde eum non veniam tempora odio ut est laborum ipsam minima debitis cum pariatur quo saepe hic.</p>
                    </div>
                    <div id="feature" class="mt-4">
                        <h2 class="site-title" >Features</h2>
                        <span class="mb-0 mr-3"><i class="fas fa-check-double"></i> Lorem, ipsum dolo</span>
                        <span class="mb-0 mr-3"><i class="fas fa-check-double"></i> Lorem, ipsum dolo</span>
                        <span class="mb-0 mr-3"><i class="fas fa-check-double"></i> Lorem, ipsum dolo</span>
                        <span class="mb-0 mr-3"><i class="fas fa-check-double"></i> Lorem, ipsum dolo</span>
                    </div>
                    <div id="location" class="mt-4">
                        <h2 class="site-title" >Location</h2>
                        <div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=chopta&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe></div></div>
                    </div>
                    <div id="reviews" class="mt-4">
                        <h2 class="site-title" >Reviews</h2>
                        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem voluptatibus animi in quia earum, quisquam assumenda quos, quod eius minus dolores, repellat laboriosam laborum molestiae. Maxime perspiciatis aspernatur natus ipsam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos eaque consequatur laudantium aut, unde eum non veniam tempora odio ut est laborum ipsam minima debitis cum pariatur quo saepe hic.Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptatem voluptatibus animi in quia earum, quisquam assumenda quos, quod eius minus dolores, repellat laboriosam laborum molestiae. Maxime perspiciatis aspernatur natus ipsam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos eaque consequatur laudantium aut, unde eum non veniam tempora odio ut est laborum ipsam minima debitis cum pariatur quo saepe hic.</p>
                    </div>

                </div>
                <div class="col-md-3 pt-2">
                    <div class="sticky-top">
                        <h5>Standard Timing</h5>
                        <p class="mb-0"><strong> Check-in Time:</strong> 12:00 am</p>
                        <p><strong> Check-out Time:</strong> 11:00 am</p>
                        <hr>
                        <h5> Enquiry</h5>
                        <form>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Contact">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="No. of Traveller">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="main">
        <div class="container">
            <div class="row my-2 py-1">


            </div>
        </div>
    </section>

    <section class="block-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="site-title">Similiar Properties</h1>
                </div>
            </div>
            <div class="row">
                <?php $n=1;
                while($n<5){
                ?>
                <div class="col-md-3 card mb-4 border-0">
                    <img src="assets/images/bg/snow-cover.png" class="card-img-top" alt="...">
                    <div class="shadow-sm">
                        <div class="card-body px-1 ">
                            <p class="font-weight-bold mb-0">Hotel Name</p>
                            <p class="small mb-0">Hotel Address</p>
                            <span class="badge badge-success">4.7 <i class="fas fa-star"></i></span> (62 Ratings)

                        </div>
                        <div class="card-footer bg-transparent border-0 px-1 ">
                            <strong> ₹45</strong> per night <a href="single.php" class="btn btn-outline-info btn-sm float-right mb-2">View Detail</a>
                        </div>
                    </div>
                </div>
                <?php
                $n++;
                }
                ?>

            </div>
        </div>
    </section>
@endsection
