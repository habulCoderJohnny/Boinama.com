        <div class="col-lg-4">
            <div class="user-profile-info-area">
                <ul class="links">
                    @php
                        
                        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'off') {
                            $link = 'https';
                        } else {
                            $link = 'http';
                        
                            // Here append the common URL characters.
                            $link .= '://';
                        
                            // Append the host(domain name, ip) to the URL.
                            $link .= $_SERVER['HTTP_HOST'];
                        
                            // Append the requested resource location to the URL
                            $link .= $_SERVER['REQUEST_URI'];
                        }
                        
                    @endphp
                    <li class="{{ $link == route('user-dashboard') ? 'active' : '' }}">
                        <a href="{{ route('user-dashboard') }}">
                            {{ __('Dashboard') }}
                        </a>
                    </li>

                    <li class="{{ $link == route('user-orders') ? 'active' : '' }}">
                        <a href="{{ route('user-orders') }}">
                            {{ __('Purchased Items') }}
                        </a>
                    </li>

                    <li class="{{ $link == route('user-deposit-index') ? 'active' : '' }}">
                        <a href="{{ route('user-deposit-index') }}">{{ __('Deposit') }}</a>
                    </li>

                    <li class="{{ $link == route('user-reward-index') ? 'active' : '' }}">
                        <a href="{{ route('user-reward-index') }}">{{ __('Rewards') }}</a>
                    </li>

                    @if ($gs->is_affilate == 1)
                        <li class="{{ $link == route('user-affilate-code') ? 'active' : '' }}">
                            <a href="{{ route('user-affilate-code') }}">{{ __('Affiliate Code') }}</a>
                        </li>

                        <li class="{{ $link == route('user-wwt-index') ? 'active' : '' }}">
                            <a href="{{ route('user-wwt-index') }}">{{ __('Withdraw') }}</a>
                        </li>
                    @endif


                    <li class="{{ $link == route('user-order-track') ? 'active' : '' }}">
                        <a href="{{ route('user-order-track') }}">{{ __('Order Tracking') }}</a>
                    </li>

                    <li class="{{ $link == route('user-messages') ? 'active' : '' }}">
                        <a href="{{ route('user-messages') }}">{{ __('Messages') }}</a>
                    </li>

                    <li class="{{ $link == route('user-message-index') ? 'active' : '' }}">
                        <a href="{{ route('user-message-index') }}">{{ __('Tickets') }}</a>
                    </li>

                    <li class="{{ $link == route('user-dmessage-index') ? 'active' : '' }}">
                        <a href="{{ route('user-dmessage-index') }}">{{ __('Disputes') }}</a>
                    </li>

                    <li class="{{ $link == route('user-profile') ? 'active' : '' }}">
                        <a href="{{ route('user-profile') }}">
                            {{ __('Edit Profile') }}
                        </a>
                    </li>

                    <li class="{{ $link == route('user-reset') ? 'active' : '' }}">
                        <a href="{{ route('user-reset') }}">
                            {{ __('Reset Password') }}
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('user-logout') }}">
                            {{ __('Logout') }}
                        </a>
                    </li>

                </ul>
            </div>
        </div>
