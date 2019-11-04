@extends('layouts.app')
@section('title', 'International Wire Transfer')
@section('content')
<div class="page__content" id="page-content">
    <style>
        .widget__title {
            font-size: 18px !important;
            line-height: 1.18;
            color: #ff6000 !important;
            /* margin-bottom: 40px; */
        }

        .payee__icon {
            font-size: 20px;
        }

        p.large-type {
            font-size: 15px;
            line-height: 1.7;
            text-align: justify
        }

        .form-group label {
            margin-bottom: 15px;
            font-weight: 600;
            font-size: 13px;
            color: #323c47;
            color: #4a4a4a;
            letter-spacing: 0.65px;
        }
    </style>

    <!-- SIDEPANEL -->

    <!-- //END SIDEPANEL -->
    <!-- PAGE CONTENT CONTAINER -->
    <div class="content" id="content">
        <!-- PAGE HEADING -->
        <div class="page-heading">
            <nav aria-label="breadcrumb" role="navigation">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('client.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Transfer Funds</li>
                    <li class="breadcrumb-item active">External Accounts</li>
                </ol>
            </nav>
        </div>
        <!-- //END PAGE HEADING -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-12 mt-4">

                    <div class="card">
                        <div class="widget invert widget--items-middle">
                            <div class="widget__icon_layer widget__icon_layer--right"><span
                                    class="li-cash-dollar"></span>
                            </div>
                            <div class="widget__container">
                                <div class="widget__line">
                                    <div class="widget__icon"><span class="li-cash-dollar"></span></div>
                                    <div class="widget__title">International Transfer</div>
                                    <div class="widget__subtitle"> It's easy to move funds between across international
                                        borders.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">


                            <div class="rw-accordion">
                                <div class="rw-accordion__item open">
                                    <div class="rw-accordion__content">

                                        <form action="{{ route('wire.dashboard.submit')}}" method="post">
                                            @csrf
                                            <div class="form-group row">
                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Beneficiary Country<sup>*</sup><br>
                                                        @error('beneficiary_country')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <select name="beneficiary_country"
                                                            class="custom-select @error('beneficiary_country') is-invalid @enderror">
                                                            <option value=""> ‐ Selected prefered option‐ </option>
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            <option value="Åland Islands">Åland Islands</option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="American Samoa">American Samoa</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Anguilla">Anguilla</option>
                                                            <option value="Antarctica">Antarctica</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda
                                                            </option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Armenia">Armenia</option>
                                                            <option value="Aruba">Aruba</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Austria">Austria</option>
                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                            <option value="Bahamas">Bahamas</option>
                                                            <option value="Bahrain">Bahrain</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Belarus">Belarus</option>
                                                            <option value="Belgium">Belgium</option>
                                                            <option value="Belize">Belize</option>
                                                            <option value="Benin">Benin</option>
                                                            <option value="Bermuda">Bermuda</option>
                                                            <option value="Bhutan">Bhutan</option>
                                                            <option value="Bolivia">Bolivia</option>
                                                            <option value="Bosnia and Herzegovina">Bosnia and
                                                                Herzegovina</option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Bouvet Island">Bouvet Island</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="British Indian Ocean Territory">British
                                                                Indian Ocean Territory</option>
                                                            <option value="Brunei Darussalam">Brunei Darussalam</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Cape Verde">Cape Verde</option>
                                                            <option value="Cayman Islands">Cayman Islands</option>
                                                            <option value="Central African Republic">Central African
                                                                Republic</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Christmas Island">Christmas Island</option>
                                                            <option value="Cocos (Keeling) Islands">Cocos (Keeling)
                                                                Islands</option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Congo">Congo</option>
                                                            <option value="Congo, The Democratic Republic of The">Congo,
                                                                The Democratic Republic of The</option>
                                                            <option value="Cook Islands">Cook Islands</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Cote D'ivoire">Cote D'ivoire</option>
                                                            <option value="Croatia">Croatia</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czech Republic">Czech Republic</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Dominican Republic">Dominican Republic
                                                            </option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Eritrea">Eritrea</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="Falkland Islands (Malvinas)">Falkland Islands
                                                                (Malvinas)</option>
                                                            <option value="Faroe Islands">Faroe Islands</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="France">France</option>
                                                            <option value="French Guiana">French Guiana</option>
                                                            <option value="French Polynesia">French Polynesia</option>
                                                            <option value="French Southern Territories">French Southern
                                                                Territories</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="Gambia">Gambia</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Gibraltar">Gibraltar</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Greenland">Greenland</option>
                                                            <option value="Grenada">Grenada</option>
                                                            <option value="Guadeloupe">Guadeloupe</option>
                                                            <option value="Guam">Guam</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guernsey">Guernsey</option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guinea-bissau">Guinea-bissau</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Heard Island and Mcdonald Islands">Heard
                                                                Island and Mcdonald Islands</option>
                                                            <option value="Holy See (Vatican City State)">Holy See
                                                                (Vatican City State)</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hong Kong">Hong Kong</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="India">India</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Iran, Islamic Republic of">Iran, Islamic
                                                                Republic of</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Isle of Man">Isle of Man</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Jersey">Jersey</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Korea, Democratic People's Republic of">
                                                                Korea, Democratic People's Republic of</option>
                                                            <option value="Korea, Republic of">Korea, Republic of
                                                            </option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Lao People's Democratic Republic">Lao
                                                                People's Democratic Republic</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Lebanon">Lebanon</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Liberia">Liberia</option>
                                                            <option value="Libyan Arab Jamahiriya">Libyan Arab
                                                                Jamahiriya</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Macao">Macao</option>
                                                            <option value="Macedonia, The Former Yugoslav Republic of">
                                                                Macedonia, The Former Yugoslav Republic of</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Martinique">Martinique</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Mayotte">Mayotte</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Micronesia, Federated States of">Micronesia,
                                                                Federated States of</option>
                                                            <option value="Moldova, Republic of">Moldova, Republic of
                                                            </option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Montenegro">Montenegro</option>
                                                            <option value="Montserrat">Montserrat</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Myanmar">Myanmar</option>
                                                            <option value="Namibia">Namibia</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Netherlands">Netherlands</option>
                                                            <option value="Netherlands Antilles">Netherlands Antilles
                                                            </option>
                                                            <option value="New Caledonia">New Caledonia</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Nigeria">Nigeria</option>
                                                            <option value="Niue">Niue</option>
                                                            <option value="Norfolk Island">Norfolk Island</option>
                                                            <option value="Northern Mariana Islands">Northern Mariana
                                                                Islands</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Palestinian Territory, Occupied">Palestinian
                                                                Territory, Occupied</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Pitcairn">Pitcairn</option>
                                                            <option value="Poland">Poland</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Puerto Rico">Puerto Rico</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Reunion">Reunion</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russian Federation">Russian Federation
                                                            </option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saint Helena">Saint Helena</option>
                                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis
                                                            </option>
                                                            <option value="Saint Lucia">Saint Lucia</option>
                                                            <option value="Saint Pierre and Miquelon">Saint Pierre and
                                                                Miquelon</option>
                                                            <option value="Saint Vincent and The Grenadines">Saint
                                                                Vincent and The Grenadines</option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="San Marino">San Marino</option>
                                                            <option value="Sao Tome and Principe">Sao Tome and Principe
                                                            </option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Serbia">Serbia</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option
                                                                value="South Georgia and The South Sandwich Islands">
                                                                South Georgia and The South Sandwich Islands</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Svalbard and Jan Mayen">Svalbard and Jan
                                                                Mayen</option>
                                                            <option value="Swaziland">Swaziland</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Syrian Arab Republic">Syrian Arab Republic
                                                            </option>
                                                            <option value="Taiwan, Province of China">Taiwan, Province
                                                                of China</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tanzania, United Republic of">Tanzania,
                                                                United Republic of</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Timor-leste">Timor-leste</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Tokelau">Tokelau</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad and Tobago">Trinidad and Tobago
                                                            </option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Turkmenistan">Turkmenistan</option>
                                                            <option value="Turks and Caicos Islands">Turks and Caicos
                                                                Islands</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="United Arab Emirates">United Arab Emirates
                                                            </option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States">United States</option>
                                                            <option value="United States Minor Outlying Islands">United
                                                                States Minor Outlying Islands</option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="Viet Nam">Viet Nam</option>
                                                            <option value="Virgin Islands, British">Virgin Islands,
                                                                British</option>
                                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.
                                                            </option>
                                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                                            <option value="Western Sahara">Western Sahara</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Beneficiary Bank<sup>*</sup><br>
                                                        @error('beneficiary_bank')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <input name="beneficiary_bank" type="text"
                                                            class="form-control @error('beneficiary_bank') is-invalid @enderror"
                                                            value="{{ old('beneficiary_bank') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Beneficiary Bank Address<sup>*</sup><br>
                                                        @error('beneficiary_bank_address')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <input name="beneficiary_bank_address" type="text"
                                                            class="form-control @error('beneficiary_bank_address') is-invalid @enderror"
                                                            value="{{ old('beneficiary_bank_address') }}">
                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Beneficiary Account Number<sup>*</sup><br>
                                                        @error('beneficiary_account_number')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <input name="beneficiary_account_number" type="text"
                                                            class="form-control @error('beneficiary_account_number') is-invalid @enderror"
                                                            value="{{ old('beneficiary_account_number') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Beneficiary Routing Number<sup>*</sup><br>
                                                        @error('beneficiary_routing_number')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <input name="beneficiary_routing_number" type="text"
                                                            class="form-control @error('beneficiary_routing_number') is-invalid @enderror"
                                                            value="{{ old('beneficiary_routing_number') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Beneficiary Bank Sort Code<br>
                                                        @error('beneficiary_sort_code')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <input name="beneficiary_sort_code" type="text"
                                                            class="form-control @error('beneficiary_sort_code') is-invalid @enderror"
                                                            value="{{ old('beneficiary_sort_code') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Beneficiary SWIFT/BIC Code<br>
                                                        @error('beneficiary_swift_code')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <input name="beneficiary_swift_code" type="text"
                                                            class="form-control @error('beneficiary_swift_code') is-invalid @enderror"
                                                            value="{{ old('beneficiary_swift_code') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Beneficiary Name<sup>*</sup><br>
                                                        @error('beneficiary_name')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <input name="beneficiary_name" type="text"
                                                            class="form-control @error('beneficiary_name') is-invalid @enderror"
                                                            value="{{ old('beneficiary_name') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Beneficiary Address<sup>*</sup><br>
                                                        @error('beneficiary_address')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <input name="beneficiary_address" type="text"
                                                            class="form-control @error('beneficiary_address') is-invalid @enderror"
                                                            value="{{ old('beneficiary_address') }}">
                                                    </div>
                                                </div>

                                                <div class="col-md-3">
                                                    <label class="col-sm-12 col-form-label">
                                                        Amount<sup>*</sup><br>
                                                        @error('pay_amount')
                                                        <small class="alert-danger">{{ $message }}</small>
                                                        @enderror

                                                    </label>

                                                    <div class="col-sm-12 col-offset-2">
                                                        <div class="form-control-element form-control-element--right">
                                                            <input name="pay_amount" type="text"
                                                                class="form-control @error('pay_amount') is-invalid @enderror"
                                                                value="{{ old('pay_amount') }}">
                                                            <div
                                                                class="form-control-element__box form-control-element__box--pretify">
                                                                <span class="fa fa-dollar"></span></div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-12 col-lg-4 offset-md-4 mt-4">
                                                <button class="btn btn-block btn-outline-secondary text-center">Approve
                                                    Wire Transfer</button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                                <div class="rw-accordion__item open mt-4">
                                    <div class="rw-accordion__header">
                                        <h4 class="rw-accordion__title">International Accounts</h4>
                                    </div>
                                    <div class="rw-accordion__content">
                                        <div class="table-responsive">
                                            <table class="table table-indent-rows margin-bottom-10"
                                                style="min-width: 500px">
                                                <tbody>
                                                    @forelse ($wiretrans as $aza)
                                                    <tr>
                                                        <td width="40">
                                                            <div
                                                                class="icon-box icon-box--bordered icon-box--rounded bg-secondary">
                                                                <span class="fa fa-money"></span></div>
                                                        </td>
                                                        <td><strong>Confirmation Number</strong><br>
                                                            <span class="text-muted">{{$aza->transaction_id}}</span>
                                                        </td>
                                                        <td><strong>Beneficiary Bank</strong><br>
                                                            <span class="text-muted">{{$aza->beneficiary_bank}}</span>
                                                        </td>
                                                        <td><strong>Beneficiary Name</strong><br>
                                                            <span class="text-muted">{{$aza->beneficiary_name}}</span>
                                                        </td>
                                                        <td><strong>Beneficiary ACN</strong><br><span
                                                                class="text-muted">******{{substr($aza->beneficiary_account_number, -4)}}</span>
                                                        </td>
                                                        <td><strong>Amount</strong><br><span
                                                                class="text-danger">${{number_format($aza->pay_amount)}}</span>
                                                        </td>
                                                        <td width="200"><strong>Registered Date</strong><br><span
                                                                class="text-muted">{{(new \Carbon\Carbon($aza->created_at))->diffForHumans()}}</span>
                                                        </td>
                                                        <td>
                                                            @if ($aza->isVerified ==1)
                                                            <div
                                                                class="btn btn-outline-success btn-block disabled btn-sm">
                                                                Approved</div>
                                                            @elseif ($aza->isVerified ==2)
                                                            <div
                                                                class="btn btn-outline-primary btn-block disabled btn-sm">
                                                                Declined</div>
                                                            @else
                                                            <div
                                                                class="btn btn-outline-danger btn-block disabled btn-sm">
                                                                Declined</div>
                                                            @endif
                                                        </td>

                                                        {{-- <td>
                                                            <button class="btn btn-danger btn-sm btn-icon"><span
                                                                    class="fa fa-trash"></span></button></td> --}}

                                                    </tr>
                                                    @empty

                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- //END PAGE CONTENT CONTAINER -->
</div>

@endsection