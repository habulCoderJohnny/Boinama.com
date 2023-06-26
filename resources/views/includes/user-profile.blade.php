
                        <div class="col-lg-3 col-md-3 col-sm-4">
                             <div class="patient__linksArea">
                             	<a href="{{route('user-dashboard')}}" class="patient-btn">{{__('Out Of Stock') }}</a>
                                <a href="{{route('user-appointments')}}" class="patient-btn">{{ __('In Stock') }}</a>
                                <a href="{{route('user-messages')}}" class="patient-btn">{{ __('Review(s)') }}</a>
                                <a href="{{route('user-message-index')}}" class="patient-btn">{{ __('Contact Seller')}}</a>

                                <a href="{{route('user-profile')}}" class="patient-btn">{{ __('Platform') }}</a>
                                <a href="{{route('user-reset')}}" class="patient-btn">{{ __('Region') }}</a>
                                <a href="{{route('user-logout')}}" class="patient-btn">{{ __('License Type') }}</a>
                            </div>
                            <div class="patient__socialArea mt_30">
                                <ul>
                                    <li><a href=""><i class="fa fa-map-marker"></i> <span>{{ __('Product Condition') }} {{ $user->address }}</span></a></li>
                                    <li><a href=""><i class="fa fa-phone"></i> <span>{{ __('Estimated Shipping Time') }} {{ $user->phone }}</span></a></li>
                                    <li><a href=""><i class="fa fa-envelope"></i> <span>{{ __('Price') }} {{ $user->email }}</span></a></li>
                                </ul>
                            </div>
                        </div>


