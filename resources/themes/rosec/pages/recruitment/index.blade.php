<?php
    use function Laravel\Folio\{middleware, name};
    name('recruitment');
?>

<x-layouts.marketing>
<x-container class="py-10">
    <div>
        <div class="common-section">
            <div class="container-medium mx-auto">
                <div class="row recuitment-cms">
                    <div class="col-lg-6 pt-lg-4 px-lg-5">
                        <h3 class="fs-2 h-fonts f600 mb-2">Work With Us</h3>
                        <p>Are you interested in working with us? </p>
                        
                        <p class="pt-3">
                        Join the ever expanding team here at Rosecoco Escorts by
                            creating an account. We are always looking to work with new beautiful, outgoing and
                            open minded ladies.</p>

                        <p class="pt-3">Feel free to call us if you are interested in working with us, we will be more than happy to
                            give you any information you need. Below are a couple of legal requirements to work
                            alongside our agency:</p>

                        <ul class="mx-3 pt-1">
                            <li>Ladies 18+</li>
                            <li>Must be legally able to work in Kenya</li>
                        </ul>

                        <p class="pt-3">In addition, these are&nbsp;traits we are looking for in our new girls:</p>

                        <ul class="mx-3 pt-1">
                            <li>Fun/outgoing</li>
                            <li>Polite</li>
                            <li>Honest/reliable</li>
                            <li>Well groomed</li>
                            <li>Enthusiastic</li>
                        </ul>

                        <p class=" pt-3 mb-5">If you have all the above, we would love to hear from you, so call us or create an account. It's free.</p>

                        <!-- <p>Please complete the following form, providing at least 3 good quality photos that accurately
                            reflect your current appearance.</p> -->

                    </div>
                    <div class="col-lg-6 recuitment-img">
                        <span class="recuitment-cms-img">
                            <img src="/images/recuitment-glow.webp" alt="" />
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark-gray-1 become-crush py-5">
            <div class="container-small mx-auto px-lg-5">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- <div id="form-response" class="alert alert-success" role="alert" style="display: none;">
                            Your response has been recorded successfully. We will get back to you soon.
                        </div> -->
                        <!-- <h4 class="fs-5 h-fonts f600">Become a Crush escort</h4> -->

                        <!-- <form class="form row" enctype="multipart/form-data">
                            <h5>
                                <p>Please fill out all relevant information to ensure we can process your request,
                                    particularly the details of the contact information and desired location.</p>
                            </h5>
                            <div class="accordion" id="accordionExample">
                                <input type="hidden" name="_token" value="qlmJm5VyHfiFU3o0f610lqcN4FBLguLpZbSM8fWi"
                                    autocomplete="off">
                                <div
                                    class="accordion-item border-0 border-bottom border-dark-gray-2 bg-transparent rounded-0 1">

                                    <button
                                        class="accordion-button fs-6 py-3 text-white f500 border-0 bg-transparent shadow-none p-0"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse1"
                                        aria-expanded="true" aria-controls="collapse1">
                                        Personal Info
                                    </button>
                                    <div id="collapse1" class="accordion-collapse collapse show"
                                        aria-labelledby="heading1" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">


                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="name"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="Name">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="phone_number"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="Phone Number">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="email"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="Email">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="age"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="Age">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="bust_size"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="Bust Size">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="dress_size"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="Dress Size">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="hair_color"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="Hair Color">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="eyes_color"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="Eyes Color">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="location"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="Location">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="accordion-item border-0 border-bottom border-dark-gray-2 bg-transparent rounded-0 11">

                                    <button
                                        class="accordion-button fs-6 py-3 text-white f500 border-0 bg-transparent shadow-none p-0"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse11"
                                        aria-expanded="true" aria-controls="collapse11">
                                        Rates&amp;Services
                                    </button>
                                    <div id="collapse11" class="accordion-collapse collapse show"
                                        aria-labelledby="heading11" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">


                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="1_hour"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="1 Hour">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="90_min"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="90 Min">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="2_hours"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="2 Hours">
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 ps-lg-0">
                                                    <div class="form-group mb-3 position-relative">
                                                        <input type="text" name="overnight_(8_hours)"
                                                            class="form-control rounded-10 text-white bg-main-bg"
                                                            placeholder="Overnight (8 hours)">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div
                                    class="accordion-item border-0 border-bottom border-dark-gray-2 bg-transparent rounded-0 16">

                                    <button
                                        class="accordion-button fs-6 py-3 text-white f500 border-0 bg-transparent shadow-none p-0"
                                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse16"
                                        aria-expanded="true" aria-controls="collapse16">
                                        Photos
                                    </button>
                                    <div id="collapse16" class="accordion-collapse collapse show"
                                        aria-labelledby="heading16" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <div class="row">


                                                <div class="col-xl-6 col-lg-12 col-sm-6 ps-lg-0">
                                                    <div class="form-group mb-3 inputFile">
                                                        <label class="text-md-small text-300 mb-2 ps-3 text-white">Photo
                                                            Upload</label>
                                                        <input id="photo_1" name="photo_1" type="file" hidden="">
                                                        <label for="photo_1"
                                                            class="form-control rounded-10 text-white bg-main-bg">No
                                                            file chosen</label>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-12 col-sm-6 ps-lg-0">
                                                    <div class="form-group mb-3 inputFile">
                                                        <label class="text-md-small text-300 mb-2 ps-3 text-white">Photo
                                                            Upload</label>
                                                        <input id="photo_2" name="photo_2" type="file" hidden="">
                                                        <label for="photo_2"
                                                            class="form-control rounded-10 text-white bg-main-bg">No
                                                            file chosen</label>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-12 col-sm-6 ps-lg-0">
                                                    <div class="form-group mb-3 inputFile">
                                                        <label class="text-md-small text-300 mb-2 ps-3 text-white">Photo
                                                            Upload</label>
                                                        <input id="photo_3" name="photo_3" type="file" hidden="">
                                                        <label for="photo_3"
                                                            class="form-control rounded-10 text-white bg-main-bg">No
                                                            file chosen</label>
                                                    </div>
                                                </div>

                                                <div class="col-xl-6 col-lg-12 col-sm-6 ps-lg-0">
                                                    <div class="form-group mb-3 inputFile">
                                                        <label class="text-md-small text-300 mb-2 ps-3 text-white">Photo
                                                            Upload</label>
                                                        <input id="photo_4" name="photo_4" type="file" hidden="">
                                                        <label for="photo_4"
                                                            class="form-control rounded-10 text-white bg-main-bg">No
                                                            file chosen</label>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-4 mb-4">
                                <input type="hidden" name="form_id" value="1">
                                <input type="hidden" name="form_target" value="info@crushescorts.com">
                                <button type="submit" class="btn bg-primary text-white f500 px-5 border-0 px-5">Submit
                                    Application</button>
                            </div>
                        </form> -->

                        <a href="/auth/register" type="submit" class="btn bg-primary text-white f500 px-5 border-0 px-5">Create
                                    Account</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- send section -->
    </div>
    </x-container>
</x-layouts.marketing>