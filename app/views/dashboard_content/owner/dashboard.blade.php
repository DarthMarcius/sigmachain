
            <div class="row mt dashboard-panels">
                <div class="col-lg-12">
                    <div class="row content-panel">                     
                        <div class="col-md-8 profile-text">
                            <h3>{{$name}}</h3>
                            <p>{{$description}}</p>
                        </div><!--/col-md-4 -->
                        
                        <div class="col-md-4 centered">
                            <div class="profile-pic">
                                <p><img src="../img/logos/{{$logo}}" class="img-circle"></p>
                            </div>
                        </div><!--/col-md-4 -->
                    </div><!-- /row -->    
                </div><!--/col-lg-12 -->
                
                <div class="col-lg-12 mt">      
                    <div id = "company-contacts" class="row content-panel profile-text">
                        <h3 class="text-center">Company Contacts</h3>    
                        <div class="col-md-6">
                            <div id="map"></div>
                            </div><! --/col-md-6 -->
                          
                            <div class="col-md-6 detailed">
                                <h4>Office Location</h4>
                                <div class="col-md-8 col-md-offset-2 mt">
                                <p>
                                    Country: {{$country}}<br/>
                                    Address: {{$address}}<br/>
                                </p>
                            </div>
                            <h4>Contacts</h4>
                            <div class="col-md-8 col-md-offset-2 mt">
                                <p>
                                    Phone: {{$phone}}<br/>
                                </p>
                                <br>
                                <p>
                                    Email: {{$email}}<br/>
                                    Skype: {{$skype}}<br/>
                                </p>
                            </div>
                        </div><! --/col-md-6 -->                         
                    </div><!--/row -->
            </div><!--/container -->

      <!--main content end-->
