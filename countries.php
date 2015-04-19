<?php

	$countries	=	array(
		'type'		=>	'select',
		'id'		=>	'countries-visited',
		'name'		=>	'countries-visited[]',
		'required'	=>	TRUE,
		'options'	=>	array(
						'Nowhere',
			'1'		=>	'Somewhere',
			2		=>	'Anywhere',

			'AF'	=>	'Afghanistan',
			'AX'	=>	'Åland Islands',
			'AL'	=>	'Albania',
			'DZ'	=>	'Algeria',
			'AS'	=>	'American Samoa',
			'AD'	=>	'Andorra',
			'AO'	=>	'Angola',
			'AI'	=>	'Anguilla',
			'AQ'	=>	'Antarctica',
			'AG'	=>	'Antigua and Barbuda',
			'AR'	=>	'Argentina',
			'AM'	=>	'Armenia',
			'AW'	=>	'Aruba',
			'AU'	=>	'Australia',
			'AT'	=>	'Austria',
			'AZ'	=>	'Azerbaijan',
			'BS'	=>	'Bahamas',
			'BH'	=>	'Bahrain',
			'BD'	=>	'Bangladesh',
			'BB'	=>	'Barbados',
			'BY'	=>	'Belarus',
			'BE'	=>	'Belgium',
			'BZ'	=>	'Belize',
			'BJ'	=>	'Benin',
			'BM'	=>	'Bermuda',
			'BT'	=>	'Bhutan',
			'BO'	=>	'Bolivia, Plurinational State of',
			'BQ'	=>	'Bonaire, Sint Eustatius and Saba',
			'BA'	=>	'Bosnia and Herzegovina',
			'BW'	=>	'Botswana',
			'BV'	=>	'Bouvet Island',
			'BR'	=>	'Brazil',
			'IO'	=>	'British Indian Ocean Territory',
			'BN'	=>	'Brunei Darussalam',
			'BG'	=>	'Bulgaria',
			'BF'	=>	'Burkina Faso',
			'BI'	=>	'Burundi',
			'KH'	=>	'Cambodia',
			'CM'	=>	'Cameroon',
			'CA'	=>	'Canada',
			'CV'	=>	'Cape Verde',
			'KY'	=>	'Cayman Islands',
			'CF'	=>	'Central African Republic',
			'TD'	=>	'Chad',
			'CL'	=>	'Chile',
			'CN'	=>	'China',
			'CX'	=>	'Christmas Island',
			'CC'	=>	'Cocos (Keeling) Islands',
			'CO'	=>	'Colombia',
			'KM'	=>	'Comoros',
			'CG'	=>	'Congo',
			'CD'	=>	'Congo, the Democratic Republic of the',
			'CK'	=>	'Cook Islands',
			'CR'	=>	'Costa Rica',
			'CI'	=>	'Côte d\'Ivoire',
			'HR'	=>	'Croatia',
			'CU'	=>	'Cuba',
			'CW'	=>	'Curaçao',
			'CY'	=>	'Cyprus',
			'CZ'	=>	'Czech Republic',
			'DK'	=>	'Denmark',
			'DJ'	=>	'Djibouti',
			'DM'	=>	'Dominica',
			'DO'	=>	'Dominican Republic',
			'EC'	=>	'Ecuador',
			'EG'	=>	'Egypt',
			'SV'	=>	'El Salvador',
			'GQ'	=>	'Equatorial Guinea',
			'ER'	=>	'Eritrea',
			'EE'	=>	'Estonia',
			'ET'	=>	'Ethiopia',
			'FK'	=>	'Falkland Islands (Malvinas)',
			'FO'	=>	'Faroe Islands',
			'FJ'	=>	'Fiji',
			'FI'	=>	'Finland',
			'FR'	=>	'France',
			'GF'	=>	'French Guiana',
			'PF'	=>	'French Polynesia',
			'TF'	=>	'French Southern Territories',
			'GA'	=>	'Gabon',
			'GM'	=>	'Gambia',
			'GE'	=>	'Georgia',
			'DE'	=>	'Germany',
			'GH'	=>	'Ghana',
			'GI'	=>	'Gibraltar',
			'GR'	=>	'Greece',
			'GL'	=>	'Greenland',
			'GD'	=>	'Grenada',
			'GP'	=>	'Guadeloupe',
			'GU'	=>	'Guam',
			'GT'	=>	'Guatemala',
			'GG'	=>	'Guernsey',
			'GN'	=>	'Guinea',
			'GW'	=>	'Guinea-Bissau',
			'GY'	=>	'Guyana',
			'HT'	=>	'Haiti',
			'HM'	=>	'Heard Island and McDonald Islands',
			'VA'	=>	'Holy See (Vatican City State)',
			'HN'	=>	'Honduras',
			'HK'	=>	'Hong Kong',
			'HU'	=>	'Hungary',
			'IS'	=>	'Iceland',
			'IN'	=>	'India',
			'ID'	=>	'Indonesia',
			'IR'	=>	'Iran, Islamic Republic of',
			'IQ'	=>	'Iraq',
			'IE'	=>	'Ireland',
			'IM'	=>	'Isle of Man',
			'IL'	=>	'Israel',
			'IT'	=>	'Italy',
			'JM'	=>	'Jamaica',
			'JP'	=>	'Japan',
			'JE'	=>	'Jersey',
			'JO'	=>	'Jordan',
			'KZ'	=>	'Kazakhstan',
			'KE'	=>	'Kenya',
			'KI'	=>	'Kiribati',
			'KP'	=>	'Korea, Democratic People\'s Republic of',
			'KR'	=>	'Korea, Republic of',
			'KW'	=>	'Kuwait',
			'KG'	=>	'Kyrgyzstan',
			'LA'	=>	'Lao People\'s Democratic Republic',
			'LV'	=>	'Latvia',
			'LB'	=>	'Lebanon',
			'LS'	=>	'Lesotho',
			'LR'	=>	'Liberia',
			'LY'	=>	'Libya',
			'LI'	=>	'Liechtenstein',
			'LT'	=>	'Lithuania',
			'LU'	=>	'Luxembourg',
			'MO'	=>	'Macao',
			'MK'	=>	'Macedonia, the former Yugoslav Republic of',
			'MG'	=>	'Madagascar',
			'MW'	=>	'Malawi',
			'MY'	=>	'Malaysia',
			'MV'	=>	'Maldives',
			'ML'	=>	'Mali',
			'MT'	=>	'Malta',
			'MH'	=>	'Marshall Islands',
			'MQ'	=>	'Martinique',
			'MR'	=>	'Mauritania',
			'MU'	=>	'Mauritius',
			'YT'	=>	'Mayotte',
			'MX'	=>	'Mexico',
			'FM'	=>	'Micronesia, Federated States of',
			'MD'	=>	'Moldova, Republic of',
			'MC'	=>	'Monaco',
			'MN'	=>	'Mongolia',
			'ME'	=>	'Montenegro',
			'MS'	=>	'Montserrat',
			'MA'	=>	'Morocco',
			'MZ'	=>	'Mozambique',
			'MM'	=>	'Myanmar',
			'NA'	=>	'Namibia',
			'NR'	=>	'Nauru',
			'NP'	=>	'Nepal',
			'NL'	=>	'Netherlands',
			'NC'	=>	'New Caledonia',
			'NZ'	=>	'New Zealand',
			'NI'	=>	'Nicaragua',
			'NE'	=>	'Niger',
			'NG'	=>	'Nigeria',
			'NU'	=>	'Niue',
			'NF'	=>	'Norfolk Island',
			'MP'	=>	'Northern Mariana Islands',
			'NO'	=>	'Norway',
			'OM'	=>	'Oman',
			'PK'	=>	'Pakistan',
			'PW'	=>	'Palau',
			'PS'	=>	'Palestine, State of',
			'PA'	=>	'Panama',
			'PG'	=>	'Papua New Guinea',
			'PY'	=>	'Paraguay',
			'PE'	=>	'Peru',
			'PH'	=>	'Philippines',
			'PN'	=>	'Pitcairn',
			'PL'	=>	'Poland',
			'PT'	=>	'Portugal',
			'PR'	=>	'Puerto Rico',
			'QA'	=>	'Qatar',
			'RE'	=>	'Réunion',
			'RO'	=>	'Romania',
			'RU'	=>	'Russian Federation',
			'RW'	=>	'Rwanda',
			'BL'	=>	'Saint Barthélemy',
			'SH'	=>	'Saint Helena, Ascension and Tristan da Cunha',
			'KN'	=>	'Saint Kitts and Nevis',
			'LC'	=>	'Saint Lucia',
			'MF'	=>	'Saint Martin (French part)',
			'PM'	=>	'Saint Pierre and Miquelon',
			'VC'	=>	'Saint Vincent and the Grenadines',
			'WS'	=>	'Samoa',
			'SM'	=>	'San Marino',
			'ST'	=>	'Sao Tome and Principe',
			'SA'	=>	'Saudi Arabia',
			'SN'	=>	'Senegal',
			'RS'	=>	'Serbia',
			'SC'	=>	'Seychelles',
			'SL'	=>	'Sierra Leone',
			'SG'	=>	'Singapore',
			'SX'	=>	'Sint Maarten (Dutch part)',
			'SK'	=>	'Slovakia',
			'SI'	=>	'Slovenia',
			'SB'	=>	'Solomon Islands',
			'SO'	=>	'Somalia',
			'ZA'	=>	'South Africa',
			'GS'	=>	'South Georgia and the South Sandwich Islands',
			'SS'	=>	'South Sudan',
			'ES'	=>	'Spain',
			'LK'	=>	'Sri Lanka',
			'SD'	=>	'Sudan',
			'SR'	=>	'Suriname',
			'SJ'	=>	'Svalbard and Jan Mayen',
			'SZ'	=>	'Swaziland',
			'SE'	=>	'Sweden',
			'CH'	=>	'Switzerland',
			'SY'	=>	'Syrian Arab Republic',
			'TW'	=>	'Taiwan, Province of China',
			'TJ'	=>	'Tajikistan',
			'TZ'	=>	'Tanzania, United Republic of',
			'TH'	=>	'Thailand',
			'TL'	=>	'Timor-Leste',
			'TG'	=>	'Togo',
			'TK'	=>	'Tokelau',
			'TO'	=>	'Tonga',
			'TT'	=>	'Trinidad and Tobago',
			'TN'	=>	'Tunisia',
			'TR'	=>	'Turkey',
			'TM'	=>	'Turkmenistan',
			'TC'	=>	'Turks and Caicos Islands',
			'TV'	=>	'Tuvalu',
			'UG'	=>	'Uganda',
			'UA'	=>	'Ukraine',
			'AE'	=>	'United Arab Emirates',
			'GB'	=>	'United Kingdom',
			'US'	=>	'United States',
			'UM'	=>	'United States Minor Outlying Islands',
			'UY'	=>	'Uruguay',
			'UZ'	=>	'Uzbekistan',
			'VU'	=>	'Vanuatu',
			'VE'	=>	'Venezuela, Bolivarian Republic of',
			'VN'	=>	'Viet Nam',
			'VG'	=>	'Virgin Islands, British',
			'VI'	=>	'Virgin Islands, U.S.',
			'WF'	=>	'Wallis and Futuna',
			'EH'	=>	'Western Sahara',
			'YE'	=>	'Yemen',
			'ZM'	=>	'Zambia',
			'ZW'	=>	'Zimbabwe'
		)
	);

	$countries['options']	=	"Afghanistan
Åland Islands
Albania
Algeria
American Samoa
Andorra
Angola
Anguilla
Antarctica
Antigua and Barbuda
Argentina
Armenia
Aruba
Australia
Austria
Azerbaijan
Bahamas
Bahrain
Bangladesh
Barbados
Belarus
Belgium
Belize
Benin
Bermuda
Bhutan
Bolivia, Plurinational State of
Bonaire, Sint Eustatius and Saba
Bosnia and Herzegovina
Botswana
Bouvet Island
Brazil
British Indian Ocean Territory
Brunei Darussalam
Bulgaria
Burkina Faso
Burundi
Cambodia
Cameroon
Canada
Cape Verde
Cayman Islands
Central African Republic
Chad
Chile
China
Christmas Island
Cocos (Keeling) Islands
Colombia
Comoros
Congo
Congo, the Democratic Republic of the
Cook Islands
Costa Rica
Côte d'Ivoire
Croatia
Cuba
Curaçao
Cyprus
Czech Republic
Denmark
Djibouti
Dominica
Dominican Republic
Ecuador
Egypt
El Salvador
Equatorial Guinea
Eritrea
Estonia
Ethiopia
Falkland Islands (Malvinas)
Faroe Islands
Fiji
Finland
France
French Guiana
French Polynesia
French Southern Territories
Gabon
Gambia
Georgia
Germany
Ghana
Gibraltar
Greece
Greenland
Grenada
Guadeloupe
Guam
Guatemala
Guernsey
Guinea
Guinea-Bissau
Guyana
Haiti
Heard Island and McDonald Islands
Holy See (Vatican City State)
Honduras
Hong Kong
Hungary
Iceland
India
Indonesia
Iran, Islamic Republic of
Iraq
Ireland
Isle of Man
Israel
Italy
Jamaica
Japan
Jersey
Jordan
Kazakhstan
Kenya
Kiribati
Korea, Democratic People's Republic of
Korea, Republic of
Kuwait
Kyrgyzstan
Lao People's Democratic Republic
Latvia
Lebanon
Lesotho
Liberia
Libya
Liechtenstein
Lithuania
Luxembourg
Macao
Macedonia, the former Yugoslav Republic of
Madagascar
Malawi
Malaysia
Maldives
Mali
Malta
Marshall Islands
Martinique
Mauritania
Mauritius
Mayotte
Mexico
Micronesia, Federated States of
Moldova, Republic of
Monaco
Mongolia
Montenegro
Montserrat
Morocco
Mozambique
Myanmar
Namibia
Nauru
Nepal
Netherlands
New Caledonia
New Zealand
Nicaragua
Niger
Nigeria
Niue
Norfolk Island
Northern Mariana Islands
Norway
Oman
Pakistan
Palau
Palestine, State of
Panama
Papua New Guinea
Paraguay
Peru
Philippines
Pitcairn
Poland
Portugal
Puerto Rico
Qatar
Réunion
Romania
Russian Federation
Rwanda
Saint Barthélemy
Saint Helena, Ascension and Tristan da Cunha
Saint Kitts and Nevis
Saint Lucia
Saint Martin (French part)
Saint Pierre and Miquelon
Saint Vincent and the Grenadines
Samoa
San Marino
Sao Tome and Principe
Saudi Arabia
Senegal
Serbia
Seychelles
Sierra Leone
Singapore
Sint Maarten (Dutch part)
Slovakia
Slovenia
Solomon Islands
Somalia
South Africa
South Georgia and the South Sandwich Islands
South Sudan
Spain
Sri Lanka
Sudan
Suriname
Svalbard and Jan Mayen
Swaziland
Sweden
Switzerland
Syrian Arab Republic
Taiwan, Province of China
Tajikistan
Tanzania, United Republic of
Thailand
Timor-Leste
Togo
Tokelau
Tonga
Trinidad and Tobago
Tunisia
Turkey
Turkmenistan
Turks and Caicos Islands
Tuvalu
Uganda
Ukraine
United Arab Emirates
United Kingdom
United States
United States Minor Outlying Islands
Uruguay
Uzbekistan
Vanuatu
Venezuela, Bolivarian Republic of
Viet Nam
Virgin Islands, British
Virgin Islands, U.S.
Wallis and Futuna
Western Sahara
Yemen
Zambia
Zimbabwe";
