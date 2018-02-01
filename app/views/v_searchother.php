<section class="b-search">
    <div class="container">
        <h1 class="wow zoomInUp" data-wow-delay="0.3s">UNSURE WHICH VEHICLE YOU ARE LOOKING FOR? FIND IT HERE</h1>
        <div class="b-search__main wow zoomInUp" data-wow-delay="0.3s">
            <h4>SELECT VEHICLE BODY TYPE</h4>
            <form action="listingsTwo.html" method="POST" class="b-search__main-form">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="m-firstSelects">
                            <div class="col-xs-4">
                                <select name="select1">
                                    <option value="0" selected="selected">Any Make</option>
                                    <option value="1" >Any Make</option>
                                    <option value="2" >Any Make</option>
                                    <option value="3" >Any Make</option>
                                    <option value="4" >Any Make</option>
                                </select>
                                <span class="fa fa-caret-down"></span>
                                <p>MISSING MANUFACTURER?</p>
                            </div>
                            <div class="col-xs-4">
                                <select name="select2">
                                    <option value="0" selected="selected">Any Model</option>
                                    <option value="1" >Any Model</option>
                                    <option value="2" >Any Model</option>
                                    <option value="3" >Any Model</option>
                                </select>
                                <span class="fa fa-caret-down"></span>
                                <p>MISSING MODEL?</p>
                            </div>
                            <div class="col-xs-4">
                                <select name="select3">
                                    <option value="1" selected="selected">Vehicle Status</option>
                                    <option value="2">Vehicle Status 2</option>
                                    <option value="3">Vehicle Status 3</option>
                                    <option value="4">Vehicle Status 4</option>
                                    <option value="5">Vehicle Status 5</option>
                                </select>
                                <span class="fa fa-caret-down"></span>
                                <p>E.G:  NEW, USED, CERTIFIED</p>
                            </div>
                        </div>
                        <div class="m-secondSelects">
                            <div class="col-xs-4">
                                <select name="select4">
                                    <option value="0" selected="selected">Min Year</option>
                                    <option value="1">Min Year</option>
                                    <option value="2">Min Year</option>
                                    <option value="3">Min Year</option>
                                    <option value="4">Min Year</option>
                                    <option value="5">Min Year</option>
                                </select>
                                <span class="fa fa-caret-down"></span>
                            </div>
                            <div class="col-xs-4">
                                <select name="select5">
                                    <option value="0" selected="selected">Max Year</option>
                                    <option value="1">Max Year</option>
                                    <option value="2">Max Year</option>
                                    <option value="3">Max Year</option>
                                    <option value="4">Max Year</option>
                                </select>
                                <span class="fa fa-caret-down"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12 text-left s-noPadding">
                        <div class="b-search__main-form-range">
                            <label>PRICE RANGE</label>
                            <div class="slider"></div>
                            <input type="hidden" name="min" class="j-min" value="" />
                            <input type="hidden" name="max" class="j-max" value="" />
                        </div>
                        <div class="b-search__main-form-submit">
                            <a href="#">Advanced search</a>
                            <button type="submit" class="btn m-btn">Search the Vehicle<span class="fa fa-angle-right"></span></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section><!--b-search-->