<main class="col-md-12">
        <div class="col-md-11 col-lg-9 col-xl-8 mx-auto window">
            <section class="stepper">
                <!-- progressbar -->
                <ul id="progressbar" style="padding-inline-start:8px;">
                    <li class="active">Travel Date</li>
                    <li class="">Available Buses</li>
                    <li class="">Book Seat</li>
                    <li class="">Details</li>
                    <li>Payment</li>
                    <li>Ticket</li>
                </ul>
            </section>
            <section class="body">
                <form id="date_form">
                    <fieldset class="animated fadeIn" style="opacity: 1;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>From</label>
                                <select class="form-control from " name="from" required="" style="display: none;">
                                    <option disabled="">--PickUp Point--</option>
                                    <option value="Pwani Uni">Pwani University</option>
                                    <option value="TUM">TUM</option>
                                    <option value="Voi">Voi</option>
                                </select><div class="nice-select form-control from" tabindex="0"><span class="current">Pwani University</span><ul class="list"><li data-value="--PickUp Point--" class="option disabled focus">--PickUp Point--</li><li data-value="Pwani Uni" class="option selected">Pwani University</li><li data-value="TUM" class="option">TUM</li><li data-value="Voi" class="option">Voi</li></ul></div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>To</label>
                                <input type="text" class="form-control to" name="to" placeholder="To" value="Kabarak" readonly="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Date of travel</label>
                                <input type="text" class="form-control" id="date" name="date" placeholder="2019-02-14" data-dtp="dtp_W16PF">
                            </div>
                            <!--  <div class="form-group col-md-6">
                                <label>Price (To and From) Kes</label>
                                <input type="text" class="form-control" id="price" name="price" value="3000" readonly>
                            </div> -->
                            <!-- <div class="form-group col-md-4 ">
                                <label>Time</label>
                                <select class="form-control time " name="time " required>
                                            <option disabled>--Time--</option>
                                            <option value=" ">08:00</option>
                                            <option value=" ">19:00</option>
                                            <option value=" ">22:00</option>
                                        </select>
                            </div> -->
                        </div>
                        <div class="row justify-content-center buttons">
                            <button type="button" class="btn next_button">Continue</button>
                        </div>
                    </fieldset>
                    <fieldset class="animated fadeIn" style="display: none; opacity: 0;">
                        <div id="results">
                            <!-- <h6>3 buses found</h6> -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-3 bus-image">
                                                    <img src="images/p2.png" alt="bus" height="130" width="130">
                                                </div>
                                                <div class="col-md-8 bus-details">
                                                    <h5 class="card-title bus-name">KCD 452G (<span class="bus-type fs-13">Majaoni School Bus</span>)</h5>
                                                    <div class="row card-text m-b-10 bus-description">
                                                        <div class="col-sm-6 fs-14">
                                                            <i class="material-icons" style="font-size: 13px;">watch</i> Departure: <span class="p-r-5 fr">20:30hr </span>
                                                        </div>
                                                        <div class="col-sm-6 fs-14">
                                                            <i class="fa fa-road"></i> Route:
                                                            <span class="p-r-5 fr"><span class="from">Pwani Uni</span> - <span class="to">Kabarak</span> </span>
                                                        </div>
                                                        <div class="col-sm-6 fs-14">
                                                            <i class="material-icons" style="font-size: 13px;">event_seat</i> Availability:
                                                            <span class="p-r-5 fr"><span class="seats-left">0</span> seats left </span>
                                                        </div>
                                                        <div class="col-sm-6 fs-14">
                                                            <i class="fa fa-money"></i> Fare:
                                                            <span class="p-r-5 fr">3000 Kes </span>
                                                        </div>
                                                    </div>
                                                    <div class="p-t-13">
                                                        <a href="#" class="btn btn-circle btn-success book_btn" data-bus="1">Book Seats</a>
                                                        <a href="#" class="fr p-t-13 g-link">View Gallery</a>
                                                        <div class="gallery1" style="display: none;">
                                                            <a href="gallery/majaoni1.jpg">
                                                                <img src="gallery/majaoni1.jpg" alt="" title="Majaoni Secondary Bus">
                                                            </a>
                                                            <a href="gallery/majaoni2.jpg">
                                                                <img src="gallery/majaoni2.jpg" alt="" title="Majaoni Secondary Bus">
                                                            </a>
                                                            <a href="gallery/majaoni3.jpg">
                                                                <img src="gallery/majaoni3.jpg" alt="" title="Majaoni Secondary Bus">
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3 bus-image">
                                                        <img src="images/p.png" alt="bus" height="130" width="130">
                                                    </div>
                                                    <div class="col-md-8 bus-details">
                                                        <h5 class="card-title bus-name">KCP 578X (<span class="bus-type">45</span> Seater)</h5>
                                                        <div class="row card-text m-b-10 bus-description">
                                                            <div class="col-md-6 fs-14">
                                                                <i class="material-icons" style="font-size: 13px;">watch</i> Departure: <span class="p-r-5 fr">20:30hr </span>
                                                            </div>
                                                            <div class="col-md-6 fs-14">
                                                                <i class="fa fa-road"></i> Route:
                                                                <span class="p-r-5 fr">Nairobi - Mombasa </span>
                                                            </div>
                                                            <div class="col-md-6 fs-14">
                                                                <i class="material-icons" style="font-size: 13px;">event_seat</i> Availability:
                                                                <span class="p-r-5 fr">12 seats left </span>
                                                            </div>
                                                            <div class="col-md-6 fs-14">
                                                                <i class="fa fa-money"></i> Fare:
                                                                <span class="p-r-5 fr">1400 Kes </span>
                                                            </div>
                                                        </div>
                                                        <div class="p-t-13">
                                                            <a href="#" class="btn btn-circle btn-success disabled book_btn">Book Seats</a>
                                                            <a href="#" class="fr p-t-10">View Gallery</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-md-3 bus-image">
                                                        <img src="images/p3.png" alt="bus" height="130" width="130">
                                                    </div>
                                                    <div class="col-md-8 bus-details">
                                                        <h5 class="card-title bus-name">KCK 122Y (<span class="bus-type">49</span> Seater)</h5>
                                                        <div class="row card-text m-b-10 bus-description">
                                                            <div class="col-md-6 fs-14">
                                                                <i class="material-icons" style="font-size: 13px;">watch</i> Departure: <span class="p-r-5 fr">21:30hr </span>
                                                            </div>
                                                            <div class="col-md-6 fs-14">
                                                                <i class="fa fa-road"></i> Route:
                                                                <span class="p-r-5 fr">Nairobi - Mombasa </span>
                                                            </div>
                                                            <div class="col-md-6 fs-14">
                                                                <i class="material-icons" style="font-size: 13px;">event_seat</i> Availability:
                                                                <span class="p-r-5 fr">22 seats left </span>
                                                            </div>
                                                            <div class="col-md-6 fs-14">
                                                                <i class="fa fa-money"></i> Fare:
                                                                <span class="p-r-5 fr">1200 Kes </span>
                                                            </div>
                                                        </div>
                                                        <div class="p-t-13">
                                                            <a href="javascript:void(0);" class="btn btn-circle btn-success disabled book_btn">Book Seats</a>
                                                            <a href="#" class="fr p-t-10">View Gallery</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center buttons">
                            <button type="button " class="btn previous_button">Back</button>
                        </div>
                    </fieldset>
                    <!-- seat map -->
                    <fieldset class="animated fadeIn" style="display: none; opacity: 0;">
                        <div id="seats">
                            <div class="row no-gutters">
                                <div class="col-lg-8 col-xl-6 col-sm-8 col-md-7">
                                    <div id="seat-map" class="seatCharts-container" tabindex="0" aria-activedescendant="2_6">
                                        <div class="front-indicator">
                                            <img src="images/driver.png" alt="Driver" height="">
                                        </div>
                                    <div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">1</div><div id="1_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">1</div><div id="1_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">2</div><div class="seatCharts-cell seatCharts-space"></div><div class="seatCharts-cell seatCharts-space"></div><div class="seatCharts-cell seatCharts-space"></div><div class="seatCharts-cell seatCharts-space"></div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">2</div><div id="2_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">3</div><div id="2_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">4</div><div class="seatCharts-cell seatCharts-space"></div><div id="2_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">5</div><div id="2_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell economy-class available">6</div><div id="2_6" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell economy-class available">7</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">3</div><div id="3_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">8</div><div id="3_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">9</div><div class="seatCharts-cell seatCharts-space"></div><div id="3_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">10</div><div id="3_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell economy-class available">11</div><div id="3_6" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell economy-class available">12</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">4</div><div class="seatCharts-cell seatCharts-space"></div><div class="seatCharts-cell seatCharts-space"></div><div class="seatCharts-cell seatCharts-space"></div><div id="4_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">13</div><div id="4_5" role="checkbox" aria-checked="true" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell economy-class animated rubberBand selected">14</div><div id="4_6" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell economy-class available">15</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">5</div><div id="5_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">16</div><div id="5_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">17</div><div class="seatCharts-cell seatCharts-space"></div><div id="5_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell economy-class available">18</div><div id="5_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell economy-class available">19</div><div id="5_6" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">20</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">6</div><div id="6_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">21</div><div id="6_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">22</div><div class="seatCharts-cell seatCharts-space"></div><div id="6_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">23</div><div id="6_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">24</div><div id="6_6" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">25</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">7</div><div id="7_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">26</div><div id="7_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell economy-class available">27</div><div class="seatCharts-cell seatCharts-space"></div><div id="7_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">28</div><div id="7_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">29</div><div id="7_6" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">30</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">8</div><div id="8_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">31</div><div id="8_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">32</div><div class="seatCharts-cell seatCharts-space"></div><div id="8_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">33</div><div id="8_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">34</div><div id="8_6" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">35</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">9</div><div id="9_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">36</div><div id="9_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">37</div><div class="seatCharts-cell seatCharts-space"></div><div id="9_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">38</div><div id="9_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">39</div><div id="9_6" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">40</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">10</div><div id="10_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">41</div><div id="10_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">42</div><div class="seatCharts-cell seatCharts-space"></div><div id="10_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">43</div><div id="10_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">44</div><div id="10_6" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">45</div></div><div class="seatCharts-row"><div class="seatCharts-cell seatCharts-space">11</div><div id="11_1" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">46</div><div id="11_2" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">47</div><div id="11_3" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">48</div><div id="11_4" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">49</div><div id="11_5" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">50</div><div id="11_6" role="checkbox" aria-checked="false" focusable="true" tabindex="-1" class="seatCharts-seat seatCharts-cell available economy-class">51</div></div></div>
                                </div>
                                <div class="col-lg-4 col-xl-6 col-sm-4 col-md-5">
                                    <div class="booking-details">
                                        <h2 class="header">Booking Details
                                            <span class="number_plate badge badge-primary fs-12">KCD 452G (Majaoni School Bus)</span></h2>
                                        <h3> Selected Seats <span id="counter">1</span>:</h3>
                                        <ul id="selected-seats">
                                        <li class="p-b-4" id="cart-item-4_5">Economy Class Seat # 14: <b>Ksh 3000</b> <a href="javascript:void(0);" class="cancel-cart-item btn btn-danger btn-sm"><i class="fa fa-trash"></i> cancel</a></li></ul>
                                        <p>Total: <b><span id="total">3000</span> Kes</b></p>
                                        <br>
                                    </div>
                                    <!-- <div id="legend" class=""></div> -->
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center buttons ">
                            <button type="button " class="btn previous_button">Back</button>
                            <button type="button " class="btn next_button btn-booked">Continue</button>
                        </div>
                    </fieldset>
                    <!-- END SEAT MAP -->
                    <!-- PERSONAL INFO -->
                    <fieldset class="animated fadeIn p-info" style="display: none; opacity: 0;">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control is-invalid" name="name" placeholder="John Doe" onkeyup="verifyInfoForm()" id="name">
                            <small class="text-danger">Name field cannot be empty</small></div>
                            <div class="form-group col-md-6">
                                <label for="id">Id</label>
                                <input type="text" class="form-control is-invalid" name="id" placeholder="12345678" onkeyup="verifyInfoForm()" id="id">
                            <small class="text-danger">Id field cannot be empty</small></div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">Mobile No.</label>
                                <input type="text" class="form-control is-invalid" id="phone" name="phone" placeholder="0712345678" onkeyup="verifyInfoForm()">
                            <small class="text-danger">Phone No field cannot be empty</small></div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="text" class="form-control is-invalid" id="email" name="email" placeholder="john@doe.com" onkeyup="verifyInfoForm()">
                            <small class="text-danger">Email field cannot be empty</small></div>
                        </div>
                        <div class="row justify-content-center buttons">
                            <button type="button " class="btn previous_button">Back</button>
                            <button type="button " class="btn next_button">Continue</button>
                        </div>
                    </fieldset>
                    <!-- END PERSONAL INFO -->
                    <!-- PAYMENT -->
                    <fieldset class="animated fadeIn p-info">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-10">
                                <h6>
                                    Please send your money to <b>0717456520 Peter Lemaron</b>.
                                    A Printable PDF ticket will be sent to your email (<span class="show-email"></span>) upon payment completion. So please ensure you provide a valid email address. <br><br>
                                    <span class="note">Note: If you havent made a deposit by 3 days your reservation will be cancelled.</span>
                                </h6>
                            </div>
                        </div>

                        <div class="row justify-content-center buttons">
                            <button type="button " class="btn previous_button">Back</button>
                            <button type="button " class="btn next_button">Finish</button>
                        </div>
                    </fieldset>
                    <!-- END PAYMENT -->
                    <!-- TICKET -->
                    <fieldset class="animated fadeIn p-info">

                        <div class="row d-flex justify-content-center">
                            <div class="col-md-3" style="margin: auto;left: 0;top: 0;">
                                <img src="booked.png" alt="Success" class="img-fluid p-b-10">
                            </div>
                            <div class="col-md-8">
                                <h6>
                                    An email has been sent to your email address (<span class="show-email"></span>). Don't forget to look in your spam folder. Safe Journey <i class="fa fa-heart text-danger"></i>.<br><br>
                                    <span class="note">Note: If you havent made a deposit by  days your reservation will be cancelled.</span>
                                </h6>
                            </div>
                        </div>

                        <div class="row justify-content-center buttons">
                            <button type="button " class="btn previous_button">Back</button>
                        </div>
                    </fieldset>
                    <!-- END TICKET -->
                </form>
            </section>
        </div>
    </main>








    <img src="../../image/travel.png"width="1440" height="500">

<div class="tm-bg-white ie-container-width-fix-2">
    <div class="container ie-h-align-center-fix">
        <div class="row">
            <div class="col-xs-12 ml-auto mr-auto ie-container-width-fix">
                <form action="index.html" method="get" class="tm-search-form tm-section-pad-2">
                    <div class="form-row tm-search-form-row">
                        <div class="form-group tm-form-element tm-form-element-100">
                            <i class="fa fa-map-marker fa-2x tm-form-element-icon"></i>
                            <input name="city" type="text" class="form-control" id="inputCity" placeholder="Type your destination...">
                        </div>
                        <div class="form-group tm-form-element tm-form-element-50">
                            <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                            <input name="check-in" type="text" class="form-control" id="inputCheckIn" placeholder="Check In">
                        </div>
                        <div class="form-group tm-form-element tm-form-element-50">
                            <i class="fa fa-calendar fa-2x tm-form-element-icon"></i>
                            <input name="check-out" type="text" class="form-control" id="inputCheckOut" placeholder="Check Out">
                        </div>
                    </div>
                    <row><h4>จังหวัดต้นทาง</h4>
                    <div class="form-row tm-search-form-row">
                        <div class="form-group tm-form-element tm-form-element-2">                                            
                            <select name="origin province" class="form-control tm-select" id="origin province">
                                <option value="">--กรุณาเลือก--</option>
                                <option value="เชียงราย ">เชียงราย </option>
                                <option value="เชียงใหม่">เชียงใหม่</option>
                                <option value="น่าน">น่าน</option>
                                <option value="พะเยา">พะเยา</option>
                                <option value="แพร่">แพร่</option>
                                <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
                                <option value="ลำปาง">ลำปาง</option>
                                <option value="ลำพูน">ลำพูน</option>
                                <option value="อุตรดิตถ์">อุตรดิตถ์</option>
                                <option value="กาฬสินธุ์">กาฬสินธุ์</option>
                                <option value="ขอนแก่น">ขอนแก่น</option>
                                <option value="ชัยภูมิ ">ชัยภูมิ </option>
                                <option value="นครพนม ">นครพนม </option>
                                <option value="นครราชสีมา ">นครราชสีมา </option>
                                <option value="บึงกาฬ">บึงกาฬ</option>
                                <option value="บุรีรัมย์ ">บุรีรัมย์</option>
                                <option value="มหาสารคาม ">มหาสารคาม </option>
                                <option value="มุกดาหาร ">มุกดาหาร </option>
                                <option value="ยโสธร">ยโสธร</option>
                                <option value="ร้อยเอ็ด ">ร้อยเอ็ด </option>
                                <option value="เลย">เลย</option>
                                <option value="สกลนคร">สกลนคร</option>
                                <option value="สุรินทร์ ">สุรินทร์ </option>
                                <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                <option value="หนองคาย ">หนองคาย </option>
                                <option value="หนองบัวลำภู ">หนองบัวลำภู </option>
                                <option value="อุดรธานี">อุดรธานี</option>
                                <option value="อุบลราชธานี">อุบลราชธานี</option>
                                <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                <option value="กำแพงเพชร ">กำแพงเพชร </option>
                                <option value="ชัยนาท ">ชัยนาท </option>
                                <option value="นครนายก">นครนายก</option>
                                <option value="นครปฐม ">นครปฐม </option>
                                <option value="นครสวรรค์ ">นครสวรรค์ </option>
                                <option value="นนทบุรี ">นนทบุรี </option>
                                <option value="ปทุมธานี">ปทุมธานี</option>
                                <option value="พระนครศรีอยุธยา ">พระนครศรีอยุธยา </option>
                                <option value="พิจิตร">พิจิตร</option>
                                <option value="พิษณุโลก ">พิษณุโลก </option>
                                <option value="เพชรบูรณ์ ">เพชรบูรณ์ </option>
                                <option value="ลพบุรี">ลพบุรี</option>
                                <option value="สมุทรปราการ ">สมุทรปราการ </option>
                                <option value="สมุทรสงคราม ">สมุทรสงคราม </option>
                                <option value="สมุทรสาคร">สมุทรสาคร</option>
                                <option value="สิงห์บุรี ">สิงห์บุรี </option>
                                <option value="สุโขทัย">สุโขทัย</option>
                                <option value="สุพรรณบุรี ">สุพรรณบุรี </option>
                                <option value="สระบุรี ">สระบุรี </option>
                                <option value="อ่างทอง ">อ่างทอง </option>
                                <option value="อุทัยธานี ">อุทัยธานี </option>
                                <option value="จันทบุรี">จันทบุรี</option>
                                <option value="ฉะเชิงเทรา ">ฉะเชิงเทรา </option>
                                <option value="ชลบุรี ">ชลบุรี </option>
                                <option value="ตราด">ตราด</option>
                                <option value="ปราจีนบุรี">ปราจีนบุรี</option>
                                <option value="ระยอง ">ระยอง </option>
                                <option value="สระแก้ว">สระแก้ว</option>
                                <option value="กาญจนบุรี">กาญจนบุรี</option>
                                <option value="ตาก ">ตาก </option>
                                <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์</option>
                                <option value="เพชรบุรี ">เพชรบุรี </option>
                                <option value="ราชบุรี ">ราชบุรี </option>
                                <option value="กระบี่">กระบี่</option>
                                <option value="ชุมพร ">ชุมพร </option>
                                <option value="ตรัง">ตรัง</option>
                                <option value="นครศรีธรรมราช ">นครศรีธรรมราช </option>
                                <option value="นราธิวาส">นราธิวาส</option>
                                <option value="ปัตตานี ">ปัตตานี </option>
                                <option value="พังงา">พังงา </option>
                                <option value="พัทลุง">พัทลุง</option>
                                <option value="ภูเก็ต ">ภูเก็ต </option>
                                <option value="ระนอง">ระนอง</option>
                                <option value="สตูล">สตูล</option>
                                <option value="สงขลา">สงขลา</option>
                                <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                <option value="ยะลา">ยะลา</option>
</row>






                            </select>
                            <i class="fa fa-2x fa-user tm-form-element-icon"></i>
                        </div>
                        <div class="form-group tm-form-element tm-form-element-2">                                            
                            <select name="children" class="form-control tm-select" id="children">
                                <option value="">Children</option>
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                            <i class="fa fa-user tm-form-element-icon tm-form-element-icon-small"></i>
                        </div>
                        <div class="form-group tm-form-element tm-form-element-2">
                            <select name="destination" class="form-control tm-select" id="destination">
                                <option value="">--กรุณาเลือก--</option>
                                <option value="เชียงราย ">เชียงราย </option>
                                <option value="เชียงใหม่">เชียงใหม่</option>
                                <option value="น่าน">น่าน</option>
                                <option value="พะเยา">พะเยา</option>
                                <option value="แพร่">แพร่</option>
                                <option value="แม่ฮ่องสอน">แม่ฮ่องสอน</option>
                                <option value="ลำปาง">ลำปาง</option>
                                <option value="ลำพูน">ลำพูน</option>
                                <option value="อุตรดิตถ์">อุตรดิตถ์</option>
                                <option value="กาฬสินธุ์">กาฬสินธุ์</option>
                                <option value="ขอนแก่น">ขอนแก่น</option>
                                <option value="ชัยภูมิ ">ชัยภูมิ </option>
                                <option value="นครพนม ">นครพนม </option>
                                <option value="นครราชสีมา ">นครราชสีมา </option>
                                <option value="บึงกาฬ">บึงกาฬ</option>
                                <option value="บุรีรัมย์ ">บุรีรัมย์</option>
                                <option value="มหาสารคาม ">มหาสารคาม </option>
                                <option value="มุกดาหาร ">มุกดาหาร </option>
                                <option value="ยโสธร">ยโสธร</option>
                                <option value="ร้อยเอ็ด ">ร้อยเอ็ด </option>
                                <option value="เลย">เลย</option>
                                <option value="สกลนคร">สกลนคร</option>
                                <option value="สุรินทร์ ">สุรินทร์ </option>
                                <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                                <option value="หนองคาย ">หนองคาย </option>
                                <option value="หนองบัวลำภู ">หนองบัวลำภู </option>
                                <option value="อุดรธานี">อุดรธานี</option>
                                <option value="อุบลราชธานี">อุบลราชธานี</option>
                                <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                                <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                                <option value="กำแพงเพชร ">กำแพงเพชร </option>
                                <option value="ชัยนาท ">ชัยนาท </option>
                                <option value="นครนายก">นครนายก</option>
                                <option value="นครปฐม ">นครปฐม </option>
                                <option value="นครสวรรค์ ">นครสวรรค์ </option>
                                <option value="นนทบุรี ">นนทบุรี </option>
                                <option value="ปทุมธานี">ปทุมธานี</option>
                                <option value="พระนครศรีอยุธยา ">พระนครศรีอยุธยา </option>
                                <option value="พิจิตร">พิจิตร</option>
                                <option value="พิษณุโลก ">พิษณุโลก </option>
                                <option value="เพชรบูรณ์ ">เพชรบูรณ์ </option>
                                <option value="ลพบุรี">ลพบุรี</option>
                                <option value="สมุทรปราการ ">สมุทรปราการ </option>
                                <option value="สมุทรสงคราม ">สมุทรสงคราม </option>
                                <option value="สมุทรสาคร">สมุทรสาคร</option>
                                <option value="สิงห์บุรี ">สิงห์บุรี </option>
                                <option value="สุโขทัย">สุโขทัย</option>
                                <option value="สุพรรณบุรี ">สุพรรณบุรี </option>
                                <option value="สระบุรี ">สระบุรี </option>
                                <option value="อ่างทอง ">อ่างทอง </option>
                                <option value="อุทัยธานี ">อุทัยธานี </option>
                                <option value="จันทบุรี">จันทบุรี</option>
                                <option value="ฉะเชิงเทรา ">ฉะเชิงเทรา </option>
                                <option value="ชลบุรี ">ชลบุรี </option>
                                <option value="ตราด">ตราด</option>
                                <option value="ปราจีนบุรี">ปราจีนบุรี</option>
                                <option value="ระยอง ">ระยอง </option>
                                <option value="สระแก้ว">สระแก้ว</option>
                                <option value="กาญจนบุรี">กาญจนบุรี</option>
                                <option value="ตาก ">ตาก </option>
                                <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์</option>
                                <option value="เพชรบุรี ">เพชรบุรี </option>
                                <option value="ราชบุรี ">ราชบุรี </option>
                                <option value="กระบี่">กระบี่</option>
                                <option value="ชุมพร ">ชุมพร </option>
                                <option value="ตรัง">ตรัง</option>
                                <option value="นครศรีธรรมราช ">นครศรีธรรมราช </option>
                                <option value="นราธิวาส">นราธิวาส</option>
                                <option value="ปัตตานี ">ปัตตานี </option>
                                <option value="พังงา">พังงา </option>
                                <option value="พัทลุง">พัทลุง</option>
                                <option value="ภูเก็ต ">ภูเก็ต </option>
                                <option value="ระนอง">ระนอง</option>
                                <option value="สตูล">สตูล</option>
                                <option value="สงขลา">สงขลา</option>
                                <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                                <option value="ยะลา">ยะลา</option>


                            </select>
                            <i class="fa fa-2x fa-bed tm-form-element-icon"></i>
                        </div>
                        <div class="form-group tm-form-element tm-form-element-2">
                            <button type="submit" class="btn btn-primary tm-btn-search">Check Availability</button>
                        </div>
                      </div>
                      
                </form>
            </div>                        
        </div>      
    </div>
</div>                  
</div>









</div>
<!---->