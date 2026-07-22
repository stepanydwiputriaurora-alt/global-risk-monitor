<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $countries = [

            [
                'name'=>'Afghanistan',
                'official_name'=>'Islamic Emirate of Afghanistan',
                'code'=>'AF',
                'capital'=>'Kabul',
                'region'=>'Asia',
                'subregion'=>'Southern Asia',
                'currency'=>'Afghani',
                'currency_symbol'=>'؋',
                'flag'=>'https://flagcdn.com/w320/af.png',
                'latitude'=>33.939110,
                'longitude'=>67.709953,
                'timezone'=>'UTC+04:30'
            ],

            [
                'name'=>'Albania',
                'official_name'=>'Republic of Albania',
                'code'=>'AL',
                'capital'=>'Tirana',
                'region'=>'Europe',
                'subregion'=>'Southern Europe',
                'currency'=>'Lek',
                'currency_symbol'=>'L',
                'flag'=>'https://flagcdn.com/w320/al.png',
                'latitude'=>41.153332,
                'longitude'=>20.168331,
                'timezone'=>'UTC+01:00'
            ],

            [
                'name'=>'Algeria',
                'official_name'=>'People\'s Democratic Republic of Algeria',
                'code'=>'DZ',
                'capital'=>'Algiers',
                'region'=>'Africa',
                'subregion'=>'Northern Africa',
                'currency'=>'Algerian Dinar',
                'currency_symbol'=>'دج',
                'flag'=>'https://flagcdn.com/w320/dz.png',
                'latitude'=>28.033886,
                'longitude'=>1.659626,
                'timezone'=>'UTC+01:00'
            ],

            [
                'name'=>'Andorra',
                'official_name'=>'Principality of Andorra',
                'code'=>'AD',
                'capital'=>'Andorra la Vella',
                'region'=>'Europe',
                'subregion'=>'Southern Europe',
                'currency'=>'Euro',
                'currency_symbol'=>'€',
                'flag'=>'https://flagcdn.com/w320/ad.png',
                'latitude'=>42.506285,
                'longitude'=>1.521801,
                'timezone'=>'UTC+01:00'
            ],

            [
                'name'=>'Angola',
                'official_name'=>'Republic of Angola',
                'code'=>'AO',
                'capital'=>'Luanda',
                'region'=>'Africa',
                'subregion'=>'Middle Africa',
                'currency'=>'Kwanza',
                'currency_symbol'=>'Kz',
                'flag'=>'https://flagcdn.com/w320/ao.png',
                'latitude'=>-11.202692,
                'longitude'=>17.873887,
                'timezone'=>'UTC+01:00'
            ],

            [
                'name'=>'Antigua and Barbuda',
                'official_name'=>'Antigua and Barbuda',
                'code'=>'AG',
                'capital'=>'Saint John\'s',
                'region'=>'Americas',
                'subregion'=>'Caribbean',
                'currency'=>'East Caribbean Dollar',
                'currency_symbol'=>'$',
                'flag'=>'https://flagcdn.com/w320/ag.png',
                'latitude'=>17.060816,
                'longitude'=>-61.796428,
                'timezone'=>'UTC-04:00'
            ],

            [
                'name'=>'Argentina',
                'official_name'=>'Argentine Republic',
                'code'=>'AR',
                'capital'=>'Buenos Aires',
                'region'=>'Americas',
                'subregion'=>'South America',
                'currency'=>'Argentine Peso',
                'currency_symbol'=>'$',
                'flag'=>'https://flagcdn.com/w320/ar.png',
                'latitude'=>-38.416097,
                'longitude'=>-63.616672,
                'timezone'=>'UTC-03:00'
            ],

            [
                'name'=>'Armenia',
                'official_name'=>'Republic of Armenia',
                'code'=>'AM',
                'capital'=>'Yerevan',
                'region'=>'Asia',
                'subregion'=>'Western Asia',
                'currency'=>'Armenian Dram',
                'currency_symbol'=>'֏',
                'flag'=>'https://flagcdn.com/w320/am.png',
                'latitude'=>40.069099,
                'longitude'=>45.038189,
                'timezone'=>'UTC+04:00'
            ],

            [
                'name'=>'Australia',
                'official_name'=>'Commonwealth of Australia',
                'code'=>'AU',
                'capital'=>'Canberra',
                'region'=>'Oceania',
                'subregion'=>'Australia and New Zealand',
                'currency'=>'Australian Dollar',
                'currency_symbol'=>'$',
                'flag'=>'https://flagcdn.com/w320/au.png',
                'latitude'=>-25.274398,
                'longitude'=>133.775136,
                'timezone'=>'UTC+10:00'
            ],

            [
                'name'=>'Austria',
                'official_name'=>'Republic of Austria',
                'code'=>'AT',
                'capital'=>'Vienna',
                'region'=>'Europe',
                'subregion'=>'Central Europe',
                'currency'=>'Euro',
                'currency_symbol'=>'€',
                'flag'=>'https://flagcdn.com/w320/at.png',
                'latitude'=>47.516231,
                'longitude'=>14.550072,
                'timezone'=>'UTC+01:00'
            ],

            [
                'name'=>'Azerbaijan',
                'official_name'=>'Republic of Azerbaijan',
                'code'=>'AZ',
                'capital'=>'Baku',
                'region'=>'Asia',
                'subregion'=>'Western Asia',
                'currency'=>'Azerbaijani Manat',
                'currency_symbol'=>'₼',
                'flag'=>'https://flagcdn.com/w320/az.png',
                'latitude'=>40.143105,
                'longitude'=>47.576927,
                'timezone'=>'UTC+04:00'
            ],

            [
                'name'=>'Bahamas',
                'official_name'=>'Commonwealth of The Bahamas',
                'code'=>'BS',
                'capital'=>'Nassau',
                'region'=>'Americas',
                'subregion'=>'Caribbean',
                'currency'=>'Bahamian Dollar',
                'currency_symbol'=>'$',
                'flag'=>'https://flagcdn.com/w320/bs.png',
                'latitude'=>25.034280,
                'longitude'=>-77.396280,
                'timezone'=>'UTC-05:00'
            ],

            [
                'name'=>'Bahrain',
                'official_name'=>'Kingdom of Bahrain',
                'code'=>'BH',
                'capital'=>'Manama',
                'region'=>'Asia',
                'subregion'=>'Western Asia',
                'currency'=>'Bahraini Dinar',
                'currency_symbol'=>'.د.ب',
                'flag'=>'https://flagcdn.com/w320/bh.png',
                'latitude'=>25.930414,
                'longitude'=>50.637772,
                'timezone'=>'UTC+03:00'
            ],

            [
                'name'=>'Bangladesh',
                'official_name'=>'People\'s Republic of Bangladesh',
                'code'=>'BD',
                'capital'=>'Dhaka',
                'region'=>'Asia',
                'subregion'=>'Southern Asia',
                'currency'=>'Taka',
                'currency_symbol'=>'৳',
                'flag'=>'https://flagcdn.com/w320/bd.png',
                'latitude'=>23.684994,
                'longitude'=>90.356331,
                'timezone'=>'UTC+06:00'
            ],

            [
                'name'=>'Barbados',
                'official_name'=>'Barbados',
                'code'=>'BB',
                'capital'=>'Bridgetown',
                'region'=>'Americas',
                'subregion'=>'Caribbean',
                'currency'=>'Barbadian Dollar',
                'currency_symbol'=>'$',
                'flag'=>'https://flagcdn.com/w320/bb.png',
                'latitude'=>13.193887,
                'longitude'=>-59.543198,
                'timezone'=>'UTC-04:00'
            ],

            [
                'name'=>'Belarus',
                'official_name'=>'Republic of Belarus',
                'code'=>'BY',
                'capital'=>'Minsk',
                'region'=>'Europe',
                'subregion'=>'Eastern Europe',
                'currency'=>'Belarusian Ruble',
                'currency_symbol'=>'Br',
                'flag'=>'https://flagcdn.com/w320/by.png',
                'latitude'=>53.709807,
                'longitude'=>27.953389,
                'timezone'=>'UTC+03:00'
            ],

            [
                'name'=>'Belgium',
                'official_name'=>'Kingdom of Belgium',
                'code'=>'BE',
                'capital'=>'Brussels',
                'region'=>'Europe',
                'subregion'=>'Western Europe',
                'currency'=>'Euro',
                'currency_symbol'=>'€',
                'flag'=>'https://flagcdn.com/w320/be.png',
                'latitude'=>50.503887,
                'longitude'=>4.469936,
                'timezone'=>'UTC+01:00'
            ],

            [
                'name'=>'Belize',
                'official_name'=>'Belize',
                'code'=>'BZ',
                'capital'=>'Belmopan',
                'region'=>'Americas',
                'subregion'=>'Central America',
                'currency'=>'Belize Dollar',
                'currency_symbol'=>'BZ$',
                'flag'=>'https://flagcdn.com/w320/bz.png',
                'latitude'=>17.189877,
                'longitude'=>-88.497650,
                'timezone'=>'UTC-06:00'
            ],

            [
                'name'=>'Benin',
                'official_name'=>'Republic of Benin',
                'code'=>'BJ',
                'capital'=>'Porto-Novo',
                'region'=>'Africa',
                'subregion'=>'Western Africa',
                'currency'=>'West African CFA Franc',
                'currency_symbol'=>'CFA',
                'flag'=>'https://flagcdn.com/w320/bj.png',
                'latitude'=>9.307690,
                'longitude'=>2.315834,
                'timezone'=>'UTC+01:00'
            ],

            [
                'name'=>'Bhutan',
                'official_name'=>'Kingdom of Bhutan',
                'code'=>'BT',
                'capital'=>'Thimphu',
                'region'=>'Asia',
                'subregion'=>'Southern Asia',
                'currency'=>'Ngultrum',
                'currency_symbol'=>'Nu.',
                'flag'=>'https://flagcdn.com/w320/bt.png',
                'latitude'=>27.514162,
                'longitude'=>90.433601,
                'timezone'=>'UTC+06:00'
            ],

            [
                'name'=>'Bolivia',
                'official_name'=>'Plurinational State of Bolivia',
                'code'=>'BO',
                'capital'=>'Sucre',
                'region'=>'Americas',
                'subregion'=>'South America',
                'currency'=>'Boliviano',
                'currency_symbol'=>'Bs.',
                'flag'=>'https://flagcdn.com/w320/bo.png',
                'latitude'=>-16.290154,
                'longitude'=>-63.588653,
                'timezone'=>'UTC-04:00'
            ],

            [
                'name'=>'Bosnia and Herzegovina',
                'official_name'=>'Bosnia and Herzegovina',
                'code'=>'BA',
                'capital'=>'Sarajevo',
                'region'=>'Europe',
                'subregion'=>'Southern Europe',
                'currency'=>'Convertible Mark',
                'currency_symbol'=>'KM',
                'flag'=>'https://flagcdn.com/w320/ba.png',
                'latitude'=>43.915886,
                'longitude'=>17.679076,
                'timezone'=>'UTC+01:00'
            ],

            [
                'name'=>'Botswana',
                'official_name'=>'Republic of Botswana',
                'code'=>'BW',
                'capital'=>'Gaborone',
                'region'=>'Africa',
                'subregion'=>'Southern Africa',
                'currency'=>'Pula',
                'currency_symbol'=>'P',
                'flag'=>'https://flagcdn.com/w320/bw.png',
                'latitude'=>-22.328474,
                'longitude'=>24.684866,
                'timezone'=>'UTC+02:00'
            ],

            [
                'name'=>'Brazil',
                'official_name'=>'Federative Republic of Brazil',
                'code'=>'BR',
                'capital'=>'Brasília',
                'region'=>'Americas',
                'subregion'=>'South America',
                'currency'=>'Brazilian Real',
                'currency_symbol'=>'R$',
                'flag'=>'https://flagcdn.com/w320/br.png',
                'latitude'=>-14.235004,
                'longitude'=>-51.925280,
                'timezone'=>'UTC-03:00'
            ],

            [
                'name'=>'Brunei',
                'official_name'=>'Nation of Brunei',
                'code'=>'BN',
                'capital'=>'Bandar Seri Begawan',
                'region'=>'Asia',
                'subregion'=>'South-Eastern Asia',
                'currency'=>'Brunei Dollar',
                'currency_symbol'=>'$',
                'flag'=>'https://flagcdn.com/w320/bn.png',
                'latitude'=>4.535277,
                'longitude'=>114.727669,
                'timezone'=>'UTC+08:00'
            ],
            [
    'name'=>'Bulgaria',
    'official_name'=>'Republic of Bulgaria',
    'code'=>'BG',
    'capital'=>'Sofia',
    'region'=>'Europe',
    'subregion'=>'Eastern Europe',
    'currency'=>'Bulgarian Lev',
    'currency_symbol'=>'лв',
    'flag'=>'https://flagcdn.com/w320/bg.png',
    'latitude'=>42.733883,
    'longitude'=>25.485830,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Burkina Faso',
    'official_name'=>'Burkina Faso',
    'code'=>'BF',
    'capital'=>'Ouagadougou',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'West African CFA Franc',
    'currency_symbol'=>'CFA',
    'flag'=>'https://flagcdn.com/w320/bf.png',
    'latitude'=>12.238333,
    'longitude'=>-1.561593,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Burundi',
    'official_name'=>'Republic of Burundi',
    'code'=>'BI',
    'capital'=>'Gitega',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Burundian Franc',
    'currency_symbol'=>'FBu',
    'flag'=>'https://flagcdn.com/w320/bi.png',
    'latitude'=>-3.373056,
    'longitude'=>29.918886,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Cambodia',
    'official_name'=>'Kingdom of Cambodia',
    'code'=>'KH',
    'capital'=>'Phnom Penh',
    'region'=>'Asia',
    'subregion'=>'South-Eastern Asia',
    'currency'=>'Riel',
    'currency_symbol'=>'៛',
    'flag'=>'https://flagcdn.com/w320/kh.png',
    'latitude'=>12.565679,
    'longitude'=>104.990963,
    'timezone'=>'UTC+07:00'
],

[
    'name'=>'Cameroon',
    'official_name'=>'Republic of Cameroon',
    'code'=>'CM',
    'capital'=>'Yaoundé',
    'region'=>'Africa',
    'subregion'=>'Middle Africa',
    'currency'=>'Central African CFA Franc',
    'currency_symbol'=>'FCFA',
    'flag'=>'https://flagcdn.com/w320/cm.png',
    'latitude'=>7.369722,
    'longitude'=>12.354722,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Canada',
    'official_name'=>'Canada',
    'code'=>'CA',
    'capital'=>'Ottawa',
    'region'=>'Americas',
    'subregion'=>'North America',
    'currency'=>'Canadian Dollar',
    'currency_symbol'=>'C$',
    'flag'=>'https://flagcdn.com/w320/ca.png',
    'latitude'=>56.130366,
    'longitude'=>-106.346771,
    'timezone'=>'UTC-05:00'
],

[
    'name'=>'Cape Verde',
    'official_name'=>'Republic of Cabo Verde',
    'code'=>'CV',
    'capital'=>'Praia',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'Cape Verdean Escudo',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/cv.png',
    'latitude'=>16.002082,
    'longitude'=>-24.013197,
    'timezone'=>'UTC-01:00'
],

[
    'name'=>'Central African Republic',
    'official_name'=>'Central African Republic',
    'code'=>'CF',
    'capital'=>'Bangui',
    'region'=>'Africa',
    'subregion'=>'Middle Africa',
    'currency'=>'Central African CFA Franc',
    'currency_symbol'=>'FCFA',
    'flag'=>'https://flagcdn.com/w320/cf.png',
    'latitude'=>6.611111,
    'longitude'=>20.939444,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Chad',
    'official_name'=>'Republic of Chad',
    'code'=>'TD',
    'capital'=>'N\'Djamena',
    'region'=>'Africa',
    'subregion'=>'Middle Africa',
    'currency'=>'Central African CFA Franc',
    'currency_symbol'=>'FCFA',
    'flag'=>'https://flagcdn.com/w320/td.png',
    'latitude'=>15.454166,
    'longitude'=>18.732207,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Chile',
    'official_name'=>'Republic of Chile',
    'code'=>'CL',
    'capital'=>'Santiago',
    'region'=>'Americas',
    'subregion'=>'South America',
    'currency'=>'Chilean Peso',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/cl.png',
    'latitude'=>-35.675147,
    'longitude'=>-71.542969,
    'timezone'=>'UTC-04:00'
],
[
    'name'=>'China',
    'official_name'=>'People\'s Republic of China',
    'code'=>'CN',
    'capital'=>'Beijing',
    'region'=>'Asia',
    'subregion'=>'Eastern Asia',
    'currency'=>'Chinese Yuan',
    'currency_symbol'=>'¥',
    'flag'=>'https://flagcdn.com/w320/cn.png',
    'latitude'=>35.861660,
    'longitude'=>104.195397,
    'timezone'=>'UTC+08:00'
],

[
    'name'=>'Colombia',
    'official_name'=>'Republic of Colombia',
    'code'=>'CO',
    'capital'=>'Bogotá',
    'region'=>'Americas',
    'subregion'=>'South America',
    'currency'=>'Colombian Peso',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/co.png',
    'latitude'=>4.570868,
    'longitude'=>-74.297333,
    'timezone'=>'UTC-05:00'
],

[
    'name'=>'Comoros',
    'official_name'=>'Union of the Comoros',
    'code'=>'KM',
    'capital'=>'Moroni',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Comorian Franc',
    'currency_symbol'=>'CF',
    'flag'=>'https://flagcdn.com/w320/km.png',
    'latitude'=>-11.875001,
    'longitude'=>43.872219,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Congo',
    'official_name'=>'Republic of the Congo',
    'code'=>'CG',
    'capital'=>'Brazzaville',
    'region'=>'Africa',
    'subregion'=>'Middle Africa',
    'currency'=>'Central African CFA Franc',
    'currency_symbol'=>'FCFA',
    'flag'=>'https://flagcdn.com/w320/cg.png',
    'latitude'=>-0.228021,
    'longitude'=>15.827659,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Costa Rica',
    'official_name'=>'Republic of Costa Rica',
    'code'=>'CR',
    'capital'=>'San José',
    'region'=>'Americas',
    'subregion'=>'Central America',
    'currency'=>'Costa Rican Colón',
    'currency_symbol'=>'₡',
    'flag'=>'https://flagcdn.com/w320/cr.png',
    'latitude'=>9.748917,
    'longitude'=>-83.753428,
    'timezone'=>'UTC-06:00'
],

[
    'name'=>'Croatia',
    'official_name'=>'Republic of Croatia',
    'code'=>'HR',
    'capital'=>'Zagreb',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/hr.png',
    'latitude'=>45.100000,
    'longitude'=>15.200000,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Cuba',
    'official_name'=>'Republic of Cuba',
    'code'=>'CU',
    'capital'=>'Havana',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Cuban Peso',
    'currency_symbol'=>'₱',
    'flag'=>'https://flagcdn.com/w320/cu.png',
    'latitude'=>21.521757,
    'longitude'=>-77.781167,
    'timezone'=>'UTC-05:00'
],

[
    'name'=>'Cyprus',
    'official_name'=>'Republic of Cyprus',
    'code'=>'CY',
    'capital'=>'Nicosia',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/cy.png',
    'latitude'=>35.126413,
    'longitude'=>33.429859,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Czech Republic',
    'official_name'=>'Czech Republic',
    'code'=>'CZ',
    'capital'=>'Prague',
    'region'=>'Europe',
    'subregion'=>'Central Europe',
    'currency'=>'Czech Koruna',
    'currency_symbol'=>'Kč',
    'flag'=>'https://flagcdn.com/w320/cz.png',
    'latitude'=>49.817492,
    'longitude'=>15.472962,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Democratic Republic of the Congo',
    'official_name'=>'Democratic Republic of the Congo',
    'code'=>'CD',
    'capital'=>'Kinshasa',
    'region'=>'Africa',
    'subregion'=>'Middle Africa',
    'currency'=>'Congolese Franc',
    'currency_symbol'=>'FC',
    'flag'=>'https://flagcdn.com/w320/cd.png',
    'latitude'=>-4.038333,
    'longitude'=>21.758664,
    'timezone'=>'UTC+01:00'
],
[
    'name'=>'Denmark',
    'official_name'=>'Kingdom of Denmark',
    'code'=>'DK',
    'capital'=>'Copenhagen',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Danish Krone',
    'currency_symbol'=>'kr',
    'flag'=>'https://flagcdn.com/w320/dk.png',
    'latitude'=>56.263920,
    'longitude'=>9.501785,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Djibouti',
    'official_name'=>'Republic of Djibouti',
    'code'=>'DJ',
    'capital'=>'Djibouti',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Djiboutian Franc',
    'currency_symbol'=>'Fdj',
    'flag'=>'https://flagcdn.com/w320/dj.png',
    'latitude'=>11.825138,
    'longitude'=>42.590275,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Dominica',
    'official_name'=>'Commonwealth of Dominica',
    'code'=>'DM',
    'capital'=>'Roseau',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'East Caribbean Dollar',
    'currency_symbol'=>'EC$',
    'flag'=>'https://flagcdn.com/w320/dm.png',
    'latitude'=>15.414999,
    'longitude'=>-61.370976,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Dominican Republic',
    'official_name'=>'Dominican Republic',
    'code'=>'DO',
    'capital'=>'Santo Domingo',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Dominican Peso',
    'currency_symbol'=>'RD$',
    'flag'=>'https://flagcdn.com/w320/do.png',
    'latitude'=>18.735693,
    'longitude'=>-70.162651,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Ecuador',
    'official_name'=>'Republic of Ecuador',
    'code'=>'EC',
    'capital'=>'Quito',
    'region'=>'Americas',
    'subregion'=>'South America',
    'currency'=>'United States Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/ec.png',
    'latitude'=>-1.831239,
    'longitude'=>-78.183406,
    'timezone'=>'UTC-05:00'
],

[
    'name'=>'Egypt',
    'official_name'=>'Arab Republic of Egypt',
    'code'=>'EG',
    'capital'=>'Cairo',
    'region'=>'Africa',
    'subregion'=>'Northern Africa',
    'currency'=>'Egyptian Pound',
    'currency_symbol'=>'E£',
    'flag'=>'https://flagcdn.com/w320/eg.png',
    'latitude'=>26.820553,
    'longitude'=>30.802498,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'El Salvador',
    'official_name'=>'Republic of El Salvador',
    'code'=>'SV',
    'capital'=>'San Salvador',
    'region'=>'Americas',
    'subregion'=>'Central America',
    'currency'=>'United States Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/sv.png',
    'latitude'=>13.794185,
    'longitude'=>-88.896530,
    'timezone'=>'UTC-06:00'
],

[
    'name'=>'Equatorial Guinea',
    'official_name'=>'Republic of Equatorial Guinea',
    'code'=>'GQ',
    'capital'=>'Malabo',
    'region'=>'Africa',
    'subregion'=>'Middle Africa',
    'currency'=>'Central African CFA Franc',
    'currency_symbol'=>'FCFA',
    'flag'=>'https://flagcdn.com/w320/gq.png',
    'latitude'=>1.650801,
    'longitude'=>10.267895,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Eritrea',
    'official_name'=>'State of Eritrea',
    'code'=>'ER',
    'capital'=>'Asmara',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Nakfa',
    'currency_symbol'=>'Nfk',
    'flag'=>'https://flagcdn.com/w320/er.png',
    'latitude'=>15.179384,
    'longitude'=>39.782334,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Estonia',
    'official_name'=>'Republic of Estonia',
    'code'=>'EE',
    'capital'=>'Tallinn',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/ee.png',
    'latitude'=>58.595272,
    'longitude'=>25.013607,
    'timezone'=>'UTC+02:00'
],
[
    'name'=>'Eswatini',
    'official_name'=>'Kingdom of Eswatini',
    'code'=>'SZ',
    'capital'=>'Mbabane',
    'region'=>'Africa',
    'subregion'=>'Southern Africa',
    'currency'=>'Lilangeni',
    'currency_symbol'=>'E',
    'flag'=>'https://flagcdn.com/w320/sz.png',
    'latitude'=>-26.522503,
    'longitude'=>31.465866,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Ethiopia',
    'official_name'=>'Federal Democratic Republic of Ethiopia',
    'code'=>'ET',
    'capital'=>'Addis Ababa',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Ethiopian Birr',
    'currency_symbol'=>'Br',
    'flag'=>'https://flagcdn.com/w320/et.png',
    'latitude'=>9.145000,
    'longitude'=>40.489673,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Fiji',
    'official_name'=>'Republic of Fiji',
    'code'=>'FJ',
    'capital'=>'Suva',
    'region'=>'Oceania',
    'subregion'=>'Melanesia',
    'currency'=>'Fiji Dollar',
    'currency_symbol'=>'FJ$',
    'flag'=>'https://flagcdn.com/w320/fj.png',
    'latitude'=>-17.713371,
    'longitude'=>178.065033,
    'timezone'=>'UTC+12:00'
],

[
    'name'=>'Finland',
    'official_name'=>'Republic of Finland',
    'code'=>'FI',
    'capital'=>'Helsinki',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/fi.png',
    'latitude'=>61.924110,
    'longitude'=>25.748151,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'France',
    'official_name'=>'French Republic',
    'code'=>'FR',
    'capital'=>'Paris',
    'region'=>'Europe',
    'subregion'=>'Western Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/fr.png',
    'latitude'=>46.227638,
    'longitude'=>2.213749,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Gabon',
    'official_name'=>'Gabonese Republic',
    'code'=>'GA',
    'capital'=>'Libreville',
    'region'=>'Africa',
    'subregion'=>'Middle Africa',
    'currency'=>'Central African CFA Franc',
    'currency_symbol'=>'FCFA',
    'flag'=>'https://flagcdn.com/w320/ga.png',
    'latitude'=>-0.803689,
    'longitude'=>11.609444,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Gambia',
    'official_name'=>'Republic of the Gambia',
    'code'=>'GM',
    'capital'=>'Banjul',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'Dalasi',
    'currency_symbol'=>'D',
    'flag'=>'https://flagcdn.com/w320/gm.png',
    'latitude'=>13.443182,
    'longitude'=>-15.310139,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Georgia',
    'official_name'=>'Georgia',
    'code'=>'GE',
    'capital'=>'Tbilisi',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Georgian Lari',
    'currency_symbol'=>'₾',
    'flag'=>'https://flagcdn.com/w320/ge.png',
    'latitude'=>42.315407,
    'longitude'=>43.356892,
    'timezone'=>'UTC+04:00'
],

[
    'name'=>'Germany',
    'official_name'=>'Federal Republic of Germany',
    'code'=>'DE',
    'capital'=>'Berlin',
    'region'=>'Europe',
    'subregion'=>'Western Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/de.png',
    'latitude'=>51.165691,
    'longitude'=>10.451526,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Ghana',
    'official_name'=>'Republic of Ghana',
    'code'=>'GH',
    'capital'=>'Accra',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'Ghanaian Cedi',
    'currency_symbol'=>'₵',
    'flag'=>'https://flagcdn.com/w320/gh.png',
    'latitude'=>7.946527,
    'longitude'=>-1.023194,
    'timezone'=>'UTC+00:00'
],
[
    'name'=>'Greece',
    'official_name'=>'Hellenic Republic',
    'code'=>'GR',
    'capital'=>'Athens',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/gr.png',
    'latitude'=>39.074208,
    'longitude'=>21.824312,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Grenada',
    'official_name'=>'Grenada',
    'code'=>'GD',
    'capital'=>'Saint George\'s',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'East Caribbean Dollar',
    'currency_symbol'=>'EC$',
    'flag'=>'https://flagcdn.com/w320/gd.png',
    'latitude'=>12.262776,
    'longitude'=>-61.604171,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Guatemala',
    'official_name'=>'Republic of Guatemala',
    'code'=>'GT',
    'capital'=>'Guatemala City',
    'region'=>'Americas',
    'subregion'=>'Central America',
    'currency'=>'Quetzal',
    'currency_symbol'=>'Q',
    'flag'=>'https://flagcdn.com/w320/gt.png',
    'latitude'=>15.783471,
    'longitude'=>-90.230759,
    'timezone'=>'UTC-06:00'
],

[
    'name'=>'Guinea',
    'official_name'=>'Republic of Guinea',
    'code'=>'GN',
    'capital'=>'Conakry',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'Guinean Franc',
    'currency_symbol'=>'FG',
    'flag'=>'https://flagcdn.com/w320/gn.png',
    'latitude'=>9.945587,
    'longitude'=>-9.696645,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Guinea-Bissau',
    'official_name'=>'Republic of Guinea-Bissau',
    'code'=>'GW',
    'capital'=>'Bissau',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'West African CFA Franc',
    'currency_symbol'=>'CFA',
    'flag'=>'https://flagcdn.com/w320/gw.png',
    'latitude'=>11.803749,
    'longitude'=>-15.180413,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Guyana',
    'official_name'=>'Co-operative Republic of Guyana',
    'code'=>'GY',
    'capital'=>'Georgetown',
    'region'=>'Americas',
    'subregion'=>'South America',
    'currency'=>'Guyanese Dollar',
    'currency_symbol'=>'GY$',
    'flag'=>'https://flagcdn.com/w320/gy.png',
    'latitude'=>4.860416,
    'longitude'=>-58.930180,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Haiti',
    'official_name'=>'Republic of Haiti',
    'code'=>'HT',
    'capital'=>'Port-au-Prince',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Gourde',
    'currency_symbol'=>'G',
    'flag'=>'https://flagcdn.com/w320/ht.png',
    'latitude'=>18.971187,
    'longitude'=>-72.285215,
    'timezone'=>'UTC-05:00'
],

[
    'name'=>'Honduras',
    'official_name'=>'Republic of Honduras',
    'code'=>'HN',
    'capital'=>'Tegucigalpa',
    'region'=>'Americas',
    'subregion'=>'Central America',
    'currency'=>'Lempira',
    'currency_symbol'=>'L',
    'flag'=>'https://flagcdn.com/w320/hn.png',
    'latitude'=>15.199999,
    'longitude'=>-86.241905,
    'timezone'=>'UTC-06:00'
],

[
    'name'=>'Hungary',
    'official_name'=>'Hungary',
    'code'=>'HU',
    'capital'=>'Budapest',
    'region'=>'Europe',
    'subregion'=>'Central Europe',
    'currency'=>'Forint',
    'currency_symbol'=>'Ft',
    'flag'=>'https://flagcdn.com/w320/hu.png',
    'latitude'=>47.162494,
    'longitude'=>19.503304,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Iceland',
    'official_name'=>'Republic of Iceland',
    'code'=>'IS',
    'capital'=>'Reykjavík',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Icelandic Króna',
    'currency_symbol'=>'kr',
    'flag'=>'https://flagcdn.com/w320/is.png',
    'latitude'=>64.963051,
    'longitude'=>-19.020835,
    'timezone'=>'UTC+00:00'
],
[
    'name'=>'India',
    'official_name'=>'Republic of India',
    'code'=>'IN',
    'capital'=>'New Delhi',
    'region'=>'Asia',
    'subregion'=>'Southern Asia',
    'currency'=>'Indian Rupee',
    'currency_symbol'=>'₹',
    'flag'=>'https://flagcdn.com/w320/in.png',
    'latitude'=>20.593684,
    'longitude'=>78.962880,
    'timezone'=>'UTC+05:30'
],

[
    'name'=>'Indonesia',
    'official_name'=>'Republic of Indonesia',
    'code'=>'ID',
    'capital'=>'Jakarta',
    'region'=>'Asia',
    'subregion'=>'South-Eastern Asia',
    'currency'=>'Indonesian Rupiah',
    'currency_symbol'=>'Rp',
    'flag'=>'https://flagcdn.com/w320/id.png',
    'latitude'=>-0.789275,
    'longitude'=>113.921327,
    'timezone'=>'UTC+07:00'
],

[
    'name'=>'Iran',
    'official_name'=>'Islamic Republic of Iran',
    'code'=>'IR',
    'capital'=>'Tehran',
    'region'=>'Asia',
    'subregion'=>'Southern Asia',
    'currency'=>'Iranian Rial',
    'currency_symbol'=>'﷼',
    'flag'=>'https://flagcdn.com/w320/ir.png',
    'latitude'=>32.427908,
    'longitude'=>53.688046,
    'timezone'=>'UTC+03:30'
],

[
    'name'=>'Iraq',
    'official_name'=>'Republic of Iraq',
    'code'=>'IQ',
    'capital'=>'Baghdad',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Iraqi Dinar',
    'currency_symbol'=>'ع.د',
    'flag'=>'https://flagcdn.com/w320/iq.png',
    'latitude'=>33.223191,
    'longitude'=>43.679291,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Ireland',
    'official_name'=>'Republic of Ireland',
    'code'=>'IE',
    'capital'=>'Dublin',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/ie.png',
    'latitude'=>53.412910,
    'longitude'=>-8.243890,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Israel',
    'official_name'=>'State of Israel',
    'code'=>'IL',
    'capital'=>'Jerusalem',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Israeli New Shekel',
    'currency_symbol'=>'₪',
    'flag'=>'https://flagcdn.com/w320/il.png',
    'latitude'=>31.046051,
    'longitude'=>34.851612,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Italy',
    'official_name'=>'Italian Republic',
    'code'=>'IT',
    'capital'=>'Rome',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/it.png',
    'latitude'=>41.871940,
    'longitude'=>12.567380,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Jamaica',
    'official_name'=>'Jamaica',
    'code'=>'JM',
    'capital'=>'Kingston',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Jamaican Dollar',
    'currency_symbol'=>'J$',
    'flag'=>'https://flagcdn.com/w320/jm.png',
    'latitude'=>18.109581,
    'longitude'=>-77.297508,
    'timezone'=>'UTC-05:00'
],

[
    'name'=>'Japan',
    'official_name'=>'Japan',
    'code'=>'JP',
    'capital'=>'Tokyo',
    'region'=>'Asia',
    'subregion'=>'Eastern Asia',
    'currency'=>'Japanese Yen',
    'currency_symbol'=>'¥',
    'flag'=>'https://flagcdn.com/w320/jp.png',
    'latitude'=>36.204824,
    'longitude'=>138.252924,
    'timezone'=>'UTC+09:00'
],

[
    'name'=>'Jordan',
    'official_name'=>'Hashemite Kingdom of Jordan',
    'code'=>'JO',
    'capital'=>'Amman',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Jordanian Dinar',
    'currency_symbol'=>'JD',
    'flag'=>'https://flagcdn.com/w320/jo.png',
    'latitude'=>30.585164,
    'longitude'=>36.238414,
    'timezone'=>'UTC+03:00'
],
[
    'name'=>'Kazakhstan',
    'official_name'=>'Republic of Kazakhstan',
    'code'=>'KZ',
    'capital'=>'Astana',
    'region'=>'Asia',
    'subregion'=>'Central Asia',
    'currency'=>'Tenge',
    'currency_symbol'=>'₸',
    'flag'=>'https://flagcdn.com/w320/kz.png',
    'latitude'=>48.019573,
    'longitude'=>66.923684,
    'timezone'=>'UTC+06:00'
],

[
    'name'=>'Kenya',
    'official_name'=>'Republic of Kenya',
    'code'=>'KE',
    'capital'=>'Nairobi',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Kenyan Shilling',
    'currency_symbol'=>'KSh',
    'flag'=>'https://flagcdn.com/w320/ke.png',
    'latitude'=>-0.023559,
    'longitude'=>37.906193,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Kiribati',
    'official_name'=>'Republic of Kiribati',
    'code'=>'KI',
    'capital'=>'Tarawa',
    'region'=>'Oceania',
    'subregion'=>'Micronesia',
    'currency'=>'Australian Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/ki.png',
    'latitude'=>-3.370417,
    'longitude'=>-168.734039,
    'timezone'=>'UTC+12:00'
],

[
    'name'=>'Kuwait',
    'official_name'=>'State of Kuwait',
    'code'=>'KW',
    'capital'=>'Kuwait City',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Kuwaiti Dinar',
    'currency_symbol'=>'KD',
    'flag'=>'https://flagcdn.com/w320/kw.png',
    'latitude'=>29.311660,
    'longitude'=>47.481766,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Kyrgyzstan',
    'official_name'=>'Kyrgyz Republic',
    'code'=>'KG',
    'capital'=>'Bishkek',
    'region'=>'Asia',
    'subregion'=>'Central Asia',
    'currency'=>'Som',
    'currency_symbol'=>'с',
    'flag'=>'https://flagcdn.com/w320/kg.png',
    'latitude'=>41.204380,
    'longitude'=>74.766098,
    'timezone'=>'UTC+06:00'
],

[
    'name'=>'Laos',
    'official_name'=>'Lao People\'s Democratic Republic',
    'code'=>'LA',
    'capital'=>'Vientiane',
    'region'=>'Asia',
    'subregion'=>'South-Eastern Asia',
    'currency'=>'Lao Kip',
    'currency_symbol'=>'₭',
    'flag'=>'https://flagcdn.com/w320/la.png',
    'latitude'=>19.856270,
    'longitude'=>102.495496,
    'timezone'=>'UTC+07:00'
],

[
    'name'=>'Latvia',
    'official_name'=>'Republic of Latvia',
    'code'=>'LV',
    'capital'=>'Riga',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/lv.png',
    'latitude'=>56.879635,
    'longitude'=>24.603189,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Lebanon',
    'official_name'=>'Lebanese Republic',
    'code'=>'LB',
    'capital'=>'Beirut',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Lebanese Pound',
    'currency_symbol'=>'ل.ل',
    'flag'=>'https://flagcdn.com/w320/lb.png',
    'latitude'=>33.854721,
    'longitude'=>35.862285,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Lesotho',
    'official_name'=>'Kingdom of Lesotho',
    'code'=>'LS',
    'capital'=>'Maseru',
    'region'=>'Africa',
    'subregion'=>'Southern Africa',
    'currency'=>'Loti',
    'currency_symbol'=>'L',
    'flag'=>'https://flagcdn.com/w320/ls.png',
    'latitude'=>-29.609988,
    'longitude'=>28.233608,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Liberia',
    'official_name'=>'Republic of Liberia',
    'code'=>'LR',
    'capital'=>'Monrovia',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'Liberian Dollar',
    'currency_symbol'=>'L$',
    'flag'=>'https://flagcdn.com/w320/lr.png',
    'latitude'=>6.428055,
    'longitude'=>-9.429499,
    'timezone'=>'UTC+00:00'
],
[
    'name'=>'Libya',
    'official_name'=>'State of Libya',
    'code'=>'LY',
    'capital'=>'Tripoli',
    'region'=>'Africa',
    'subregion'=>'Northern Africa',
    'currency'=>'Libyan Dinar',
    'currency_symbol'=>'LD',
    'flag'=>'https://flagcdn.com/w320/ly.png',
    'latitude'=>26.335100,
    'longitude'=>17.228331,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Liechtenstein',
    'official_name'=>'Principality of Liechtenstein',
    'code'=>'LI',
    'capital'=>'Vaduz',
    'region'=>'Europe',
    'subregion'=>'Western Europe',
    'currency'=>'Swiss Franc',
    'currency_symbol'=>'CHF',
    'flag'=>'https://flagcdn.com/w320/li.png',
    'latitude'=>47.166000,
    'longitude'=>9.555373,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Lithuania',
    'official_name'=>'Republic of Lithuania',
    'code'=>'LT',
    'capital'=>'Vilnius',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/lt.png',
    'latitude'=>55.169438,
    'longitude'=>23.881275,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Luxembourg',
    'official_name'=>'Grand Duchy of Luxembourg',
    'code'=>'LU',
    'capital'=>'Luxembourg',
    'region'=>'Europe',
    'subregion'=>'Western Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/lu.png',
    'latitude'=>49.815273,
    'longitude'=>6.129583,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Madagascar',
    'official_name'=>'Republic of Madagascar',
    'code'=>'MG',
    'capital'=>'Antananarivo',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Malagasy Ariary',
    'currency_symbol'=>'Ar',
    'flag'=>'https://flagcdn.com/w320/mg.png',
    'latitude'=>-18.766947,
    'longitude'=>46.869107,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Malawi',
    'official_name'=>'Republic of Malawi',
    'code'=>'MW',
    'capital'=>'Lilongwe',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Malawian Kwacha',
    'currency_symbol'=>'MK',
    'flag'=>'https://flagcdn.com/w320/mw.png',
    'latitude'=>-13.254308,
    'longitude'=>34.301525,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Malaysia',
    'official_name'=>'Malaysia',
    'code'=>'MY',
    'capital'=>'Kuala Lumpur',
    'region'=>'Asia',
    'subregion'=>'South-Eastern Asia',
    'currency'=>'Malaysian Ringgit',
    'currency_symbol'=>'RM',
    'flag'=>'https://flagcdn.com/w320/my.png',
    'latitude'=>4.210484,
    'longitude'=>101.975766,
    'timezone'=>'UTC+08:00'
],

[
    'name'=>'Maldives',
    'official_name'=>'Republic of Maldives',
    'code'=>'MV',
    'capital'=>'Malé',
    'region'=>'Asia',
    'subregion'=>'Southern Asia',
    'currency'=>'Rufiyaa',
    'currency_symbol'=>'Rf',
    'flag'=>'https://flagcdn.com/w320/mv.png',
    'latitude'=>3.202778,
    'longitude'=>73.220680,
    'timezone'=>'UTC+05:00'
],

[
    'name'=>'Mali',
    'official_name'=>'Republic of Mali',
    'code'=>'ML',
    'capital'=>'Bamako',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'West African CFA Franc',
    'currency_symbol'=>'CFA',
    'flag'=>'https://flagcdn.com/w320/ml.png',
    'latitude'=>17.570692,
    'longitude'=>-3.996166,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Malta',
    'official_name'=>'Republic of Malta',
    'code'=>'MT',
    'capital'=>'Valletta',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/mt.png',
    'latitude'=>35.937496,
    'longitude'=>14.375416,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Marshall Islands',
    'official_name'=>'Republic of the Marshall Islands',
    'code'=>'MH',
    'capital'=>'Majuro',
    'region'=>'Oceania',
    'subregion'=>'Micronesia',
    'currency'=>'United States Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/mh.png',
    'latitude'=>7.131474,
    'longitude'=>171.184478,
    'timezone'=>'UTC+12:00'
],

[
    'name'=>'Mauritania',
    'official_name'=>'Islamic Republic of Mauritania',
    'code'=>'MR',
    'capital'=>'Nouakchott',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'Ouguiya',
    'currency_symbol'=>'UM',
    'flag'=>'https://flagcdn.com/w320/mr.png',
    'latitude'=>21.007890,
    'longitude'=>-10.940835,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Mauritius',
    'official_name'=>'Republic of Mauritius',
    'code'=>'MU',
    'capital'=>'Port Louis',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Mauritian Rupee',
    'currency_symbol'=>'₨',
    'flag'=>'https://flagcdn.com/w320/mu.png',
    'latitude'=>-20.348404,
    'longitude'=>57.552152,
    'timezone'=>'UTC+04:00'
],

[
    'name'=>'Mexico',
    'official_name'=>'United Mexican States',
    'code'=>'MX',
    'capital'=>'Mexico City',
    'region'=>'Americas',
    'subregion'=>'North America',
    'currency'=>'Mexican Peso',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/mx.png',
    'latitude'=>23.634501,
    'longitude'=>-102.552784,
    'timezone'=>'UTC-06:00'
],

[
    'name'=>'Micronesia',
    'official_name'=>'Federated States of Micronesia',
    'code'=>'FM',
    'capital'=>'Palikir',
    'region'=>'Oceania',
    'subregion'=>'Micronesia',
    'currency'=>'United States Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/fm.png',
    'latitude'=>7.425554,
    'longitude'=>150.550812,
    'timezone'=>'UTC+11:00'
],

[
    'name'=>'Moldova',
    'official_name'=>'Republic of Moldova',
    'code'=>'MD',
    'capital'=>'Chișinău',
    'region'=>'Europe',
    'subregion'=>'Eastern Europe',
    'currency'=>'Moldovan Leu',
    'currency_symbol'=>'L',
    'flag'=>'https://flagcdn.com/w320/md.png',
    'latitude'=>47.411631,
    'longitude'=>28.369885,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Monaco',
    'official_name'=>'Principality of Monaco',
    'code'=>'MC',
    'capital'=>'Monaco',
    'region'=>'Europe',
    'subregion'=>'Western Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/mc.png',
    'latitude'=>43.738418,
    'longitude'=>7.424616,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Mongolia',
    'official_name'=>'Mongolia',
    'code'=>'MN',
    'capital'=>'Ulaanbaatar',
    'region'=>'Asia',
    'subregion'=>'Eastern Asia',
    'currency'=>'Tögrög',
    'currency_symbol'=>'₮',
    'flag'=>'https://flagcdn.com/w320/mn.png',
    'latitude'=>46.862496,
    'longitude'=>103.846656,
    'timezone'=>'UTC+08:00'
],

[
    'name'=>'Montenegro',
    'official_name'=>'Montenegro',
    'code'=>'ME',
    'capital'=>'Podgorica',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/me.png',
    'latitude'=>42.708678,
    'longitude'=>19.374390,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Morocco',
    'official_name'=>'Kingdom of Morocco',
    'code'=>'MA',
    'capital'=>'Rabat',
    'region'=>'Africa',
    'subregion'=>'Northern Africa',
    'currency'=>'Moroccan Dirham',
    'currency_symbol'=>'MAD',
    'flag'=>'https://flagcdn.com/w320/ma.png',
    'latitude'=>31.791702,
    'longitude'=>-7.092620,
    'timezone'=>'UTC+01:00'
],
[
    'name'=>'Mozambique',
    'official_name'=>'Republic of Mozambique',
    'code'=>'MZ',
    'capital'=>'Maputo',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Mozambican Metical',
    'currency_symbol'=>'MT',
    'flag'=>'https://flagcdn.com/w320/mz.png',
    'latitude'=>-18.665695,
    'longitude'=>35.529562,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Myanmar',
    'official_name'=>'Republic of the Union of Myanmar',
    'code'=>'MM',
    'capital'=>'Naypyidaw',
    'region'=>'Asia',
    'subregion'=>'South-Eastern Asia',
    'currency'=>'Kyat',
    'currency_symbol'=>'Ks',
    'flag'=>'https://flagcdn.com/w320/mm.png',
    'latitude'=>21.913965,
    'longitude'=>95.956223,
    'timezone'=>'UTC+06:30'
],

[
    'name'=>'Namibia',
    'official_name'=>'Republic of Namibia',
    'code'=>'NA',
    'capital'=>'Windhoek',
    'region'=>'Africa',
    'subregion'=>'Southern Africa',
    'currency'=>'Namibian Dollar',
    'currency_symbol'=>'N$',
    'flag'=>'https://flagcdn.com/w320/na.png',
    'latitude'=>-22.957640,
    'longitude'=>18.490410,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Nauru',
    'official_name'=>'Republic of Nauru',
    'code'=>'NR',
    'capital'=>'Yaren',
    'region'=>'Oceania',
    'subregion'=>'Micronesia',
    'currency'=>'Australian Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/nr.png',
    'latitude'=>-0.522778,
    'longitude'=>166.931503,
    'timezone'=>'UTC+12:00'
],

[
    'name'=>'Nepal',
    'official_name'=>'Federal Democratic Republic of Nepal',
    'code'=>'NP',
    'capital'=>'Kathmandu',
    'region'=>'Asia',
    'subregion'=>'Southern Asia',
    'currency'=>'Nepalese Rupee',
    'currency_symbol'=>'₨',
    'flag'=>'https://flagcdn.com/w320/np.png',
    'latitude'=>28.394857,
    'longitude'=>84.124008,
    'timezone'=>'UTC+05:45'
],

[
    'name'=>'Netherlands',
    'official_name'=>'Kingdom of the Netherlands',
    'code'=>'NL',
    'capital'=>'Amsterdam',
    'region'=>'Europe',
    'subregion'=>'Western Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/nl.png',
    'latitude'=>52.132633,
    'longitude'=>5.291266,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'New Zealand',
    'official_name'=>'New Zealand',
    'code'=>'NZ',
    'capital'=>'Wellington',
    'region'=>'Oceania',
    'subregion'=>'Australia and New Zealand',
    'currency'=>'New Zealand Dollar',
    'currency_symbol'=>'NZ$',
    'flag'=>'https://flagcdn.com/w320/nz.png',
    'latitude'=>-40.900557,
    'longitude'=>174.885971,
    'timezone'=>'UTC+12:00'
],

[
    'name'=>'Nicaragua',
    'official_name'=>'Republic of Nicaragua',
    'code'=>'NI',
    'capital'=>'Managua',
    'region'=>'Americas',
    'subregion'=>'Central America',
    'currency'=>'Córdoba',
    'currency_symbol'=>'C$',
    'flag'=>'https://flagcdn.com/w320/ni.png',
    'latitude'=>12.865416,
    'longitude'=>-85.207229,
    'timezone'=>'UTC-06:00'
],

[
    'name'=>'Niger',
    'official_name'=>'Republic of the Niger',
    'code'=>'NE',
    'capital'=>'Niamey',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'West African CFA Franc',
    'currency_symbol'=>'CFA',
    'flag'=>'https://flagcdn.com/w320/ne.png',
    'latitude'=>17.607789,
    'longitude'=>8.081666,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Nigeria',
    'official_name'=>'Federal Republic of Nigeria',
    'code'=>'NG',
    'capital'=>'Abuja',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'Naira',
    'currency_symbol'=>'₦',
    'flag'=>'https://flagcdn.com/w320/ng.png',
    'latitude'=>9.081999,
    'longitude'=>8.675277,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'North Korea',
    'official_name'=>'Democratic People\'s Republic of Korea',
    'code'=>'KP',
    'capital'=>'Pyongyang',
    'region'=>'Asia',
    'subregion'=>'Eastern Asia',
    'currency'=>'North Korean Won',
    'currency_symbol'=>'₩',
    'flag'=>'https://flagcdn.com/w320/kp.png',
    'latitude'=>40.339852,
    'longitude'=>127.510093,
    'timezone'=>'UTC+09:00'
],

[
    'name'=>'North Macedonia',
    'official_name'=>'Republic of North Macedonia',
    'code'=>'MK',
    'capital'=>'Skopje',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Macedonian Denar',
    'currency_symbol'=>'ден',
    'flag'=>'https://flagcdn.com/w320/mk.png',
    'latitude'=>41.608635,
    'longitude'=>21.745275,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Norway',
    'official_name'=>'Kingdom of Norway',
    'code'=>'NO',
    'capital'=>'Oslo',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Norwegian Krone',
    'currency_symbol'=>'kr',
    'flag'=>'https://flagcdn.com/w320/no.png',
    'latitude'=>60.472024,
    'longitude'=>8.468946,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Oman',
    'official_name'=>'Sultanate of Oman',
    'code'=>'OM',
    'capital'=>'Muscat',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Omani Rial',
    'currency_symbol'=>'ر.ع.',
    'flag'=>'https://flagcdn.com/w320/om.png',
    'latitude'=>21.512583,
    'longitude'=>55.923255,
    'timezone'=>'UTC+04:00'
],

[
    'name'=>'Pakistan',
    'official_name'=>'Islamic Republic of Pakistan',
    'code'=>'PK',
    'capital'=>'Islamabad',
    'region'=>'Asia',
    'subregion'=>'Southern Asia',
    'currency'=>'Pakistani Rupee',
    'currency_symbol'=>'₨',
    'flag'=>'https://flagcdn.com/w320/pk.png',
    'latitude'=>30.375321,
    'longitude'=>69.345116,
    'timezone'=>'UTC+05:00'
],

[
    'name'=>'Palau',
    'official_name'=>'Republic of Palau',
    'code'=>'PW',
    'capital'=>'Ngerulmud',
    'region'=>'Oceania',
    'subregion'=>'Micronesia',
    'currency'=>'United States Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/pw.png',
    'latitude'=>7.514980,
    'longitude'=>134.582520,
    'timezone'=>'UTC+09:00'
],

[
    'name'=>'Palestine',
    'official_name'=>'State of Palestine',
    'code'=>'PS',
    'capital'=>'East Jerusalem',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Israeli New Shekel',
    'currency_symbol'=>'₪',
    'flag'=>'https://flagcdn.com/w320/ps.png',
    'latitude'=>31.952162,
    'longitude'=>35.233154,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Panama',
    'official_name'=>'Republic of Panama',
    'code'=>'PA',
    'capital'=>'Panama City',
    'region'=>'Americas',
    'subregion'=>'Central America',
    'currency'=>'Balboa',
    'currency_symbol'=>'B/.',
    'flag'=>'https://flagcdn.com/w320/pa.png',
    'latitude'=>8.537981,
    'longitude'=>-80.782127,
    'timezone'=>'UTC-05:00'
],

[
    'name'=>'Papua New Guinea',
    'official_name'=>'Independent State of Papua New Guinea',
    'code'=>'PG',
    'capital'=>'Port Moresby',
    'region'=>'Oceania',
    'subregion'=>'Melanesia',
    'currency'=>'Kina',
    'currency_symbol'=>'K',
    'flag'=>'https://flagcdn.com/w320/pg.png',
    'latitude'=>-6.314993,
    'longitude'=>143.955550,
    'timezone'=>'UTC+10:00'
],

[
    'name'=>'Paraguay',
    'official_name'=>'Republic of Paraguay',
    'code'=>'PY',
    'capital'=>'Asunción',
    'region'=>'Americas',
    'subregion'=>'South America',
    'currency'=>'Guaraní',
    'currency_symbol'=>'₲',
    'flag'=>'https://flagcdn.com/w320/py.png',
    'latitude'=>-23.442503,
    'longitude'=>-58.443832,
    'timezone'=>'UTC-04:00'
],
[
    'name'=>'Peru',
    'official_name'=>'Republic of Peru',
    'code'=>'PE',
    'capital'=>'Lima',
    'region'=>'Americas',
    'subregion'=>'South America',
    'currency'=>'Peruvian Sol',
    'currency_symbol'=>'S/',
    'flag'=>'https://flagcdn.com/w320/pe.png',
    'latitude'=>-9.189967,
    'longitude'=>-75.015152,
    'timezone'=>'UTC-05:00'
],

[
    'name'=>'Philippines',
    'official_name'=>'Republic of the Philippines',
    'code'=>'PH',
    'capital'=>'Manila',
    'region'=>'Asia',
    'subregion'=>'South-Eastern Asia',
    'currency'=>'Philippine Peso',
    'currency_symbol'=>'₱',
    'flag'=>'https://flagcdn.com/w320/ph.png',
    'latitude'=>12.879721,
    'longitude'=>121.774017,
    'timezone'=>'UTC+08:00'
],

[
    'name'=>'Poland',
    'official_name'=>'Republic of Poland',
    'code'=>'PL',
    'capital'=>'Warsaw',
    'region'=>'Europe',
    'subregion'=>'Central Europe',
    'currency'=>'Polish Złoty',
    'currency_symbol'=>'zł',
    'flag'=>'https://flagcdn.com/w320/pl.png',
    'latitude'=>51.919438,
    'longitude'=>19.145136,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Portugal',
    'official_name'=>'Portuguese Republic',
    'code'=>'PT',
    'capital'=>'Lisbon',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/pt.png',
    'latitude'=>39.399872,
    'longitude'=>-8.224454,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Qatar',
    'official_name'=>'State of Qatar',
    'code'=>'QA',
    'capital'=>'Doha',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Qatari Riyal',
    'currency_symbol'=>'﷼',
    'flag'=>'https://flagcdn.com/w320/qa.png',
    'latitude'=>25.354826,
    'longitude'=>51.183884,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Romania',
    'official_name'=>'Romania',
    'code'=>'RO',
    'capital'=>'Bucharest',
    'region'=>'Europe',
    'subregion'=>'Eastern Europe',
    'currency'=>'Romanian Leu',
    'currency_symbol'=>'lei',
    'flag'=>'https://flagcdn.com/w320/ro.png',
    'latitude'=>45.943161,
    'longitude'=>24.966760,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Russia',
    'official_name'=>'Russian Federation',
    'code'=>'RU',
    'capital'=>'Moscow',
    'region'=>'Europe',
    'subregion'=>'Eastern Europe',
    'currency'=>'Russian Ruble',
    'currency_symbol'=>'₽',
    'flag'=>'https://flagcdn.com/w320/ru.png',
    'latitude'=>61.524010,
    'longitude'=>105.318756,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Rwanda',
    'official_name'=>'Republic of Rwanda',
    'code'=>'RW',
    'capital'=>'Kigali',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Rwandan Franc',
    'currency_symbol'=>'FRw',
    'flag'=>'https://flagcdn.com/w320/rw.png',
    'latitude'=>-1.940278,
    'longitude'=>29.873888,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Saint Kitts and Nevis',
    'official_name'=>'Federation of Saint Kitts and Nevis',
    'code'=>'KN',
    'capital'=>'Basseterre',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'East Caribbean Dollar',
    'currency_symbol'=>'EC$',
    'flag'=>'https://flagcdn.com/w320/kn.png',
    'latitude'=>17.357822,
    'longitude'=>-62.782998,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Saint Lucia',
    'official_name'=>'Saint Lucia',
    'code'=>'LC',
    'capital'=>'Castries',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'East Caribbean Dollar',
    'currency_symbol'=>'EC$',
    'flag'=>'https://flagcdn.com/w320/lc.png',
    'latitude'=>13.909444,
    'longitude'=>-60.978893,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Saint Vincent and the Grenadines',
    'official_name'=>'Saint Vincent and the Grenadines',
    'code'=>'VC',
    'capital'=>'Kingstown',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'East Caribbean Dollar',
    'currency_symbol'=>'EC$',
    'flag'=>'https://flagcdn.com/w320/vc.png',
    'latitude'=>12.984305,
    'longitude'=>-61.287228,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Samoa',
    'official_name'=>'Independent State of Samoa',
    'code'=>'WS',
    'capital'=>'Apia',
    'region'=>'Oceania',
    'subregion'=>'Polynesia',
    'currency'=>'Tālā',
    'currency_symbol'=>'WS$',
    'flag'=>'https://flagcdn.com/w320/ws.png',
    'latitude'=>-13.759029,
    'longitude'=>-172.104629,
    'timezone'=>'UTC+13:00'
],

[
    'name'=>'San Marino',
    'official_name'=>'Republic of San Marino',
    'code'=>'SM',
    'capital'=>'San Marino',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/sm.png',
    'latitude'=>43.942360,
    'longitude'=>12.457777,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Sao Tome and Principe',
    'official_name'=>'Democratic Republic of Sao Tome and Principe',
    'code'=>'ST',
    'capital'=>'São Tomé',
    'region'=>'Africa',
    'subregion'=>'Middle Africa',
    'currency'=>'Dobra',
    'currency_symbol'=>'Db',
    'flag'=>'https://flagcdn.com/w320/st.png',
    'latitude'=>0.186360,
    'longitude'=>6.613081,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Saudi Arabia',
    'official_name'=>'Kingdom of Saudi Arabia',
    'code'=>'SA',
    'capital'=>'Riyadh',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Saudi Riyal',
    'currency_symbol'=>'﷼',
    'flag'=>'https://flagcdn.com/w320/sa.png',
    'latitude'=>23.885942,
    'longitude'=>45.079162,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Senegal',
    'official_name'=>'Republic of Senegal',
    'code'=>'SN',
    'capital'=>'Dakar',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'West African CFA Franc',
    'currency_symbol'=>'CFA',
    'flag'=>'https://flagcdn.com/w320/sn.png',
    'latitude'=>14.497401,
    'longitude'=>-14.452362,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Serbia',
    'official_name'=>'Republic of Serbia',
    'code'=>'RS',
    'capital'=>'Belgrade',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Serbian Dinar',
    'currency_symbol'=>'дин.',
    'flag'=>'https://flagcdn.com/w320/rs.png',
    'latitude'=>44.016521,
    'longitude'=>21.005859,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Seychelles',
    'official_name'=>'Republic of Seychelles',
    'code'=>'SC',
    'capital'=>'Victoria',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Seychellois Rupee',
    'currency_symbol'=>'₨',
    'flag'=>'https://flagcdn.com/w320/sc.png',
    'latitude'=>-4.679574,
    'longitude'=>55.491977,
    'timezone'=>'UTC+04:00'
],

[
    'name'=>'Sierra Leone',
    'official_name'=>'Republic of Sierra Leone',
    'code'=>'SL',
    'capital'=>'Freetown',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'Leone',
    'currency_symbol'=>'Le',
    'flag'=>'https://flagcdn.com/w320/sl.png',
    'latitude'=>8.460555,
    'longitude'=>-11.779889,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Singapore',
    'official_name'=>'Republic of Singapore',
    'code'=>'SG',
    'capital'=>'Singapore',
    'region'=>'Asia',
    'subregion'=>'South-Eastern Asia',
    'currency'=>'Singapore Dollar',
    'currency_symbol'=>'S$',
    'flag'=>'https://flagcdn.com/w320/sg.png',
    'latitude'=>1.352083,
    'longitude'=>103.819836,
    'timezone'=>'UTC+08:00'
],
[
    'name'=>'Slovakia',
    'official_name'=>'Slovak Republic',
    'code'=>'SK',
    'capital'=>'Bratislava',
    'region'=>'Europe',
    'subregion'=>'Central Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/sk.png',
    'latitude'=>48.669026,
    'longitude'=>19.699024,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Slovenia',
    'official_name'=>'Republic of Slovenia',
    'code'=>'SI',
    'capital'=>'Ljubljana',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/si.png',
    'latitude'=>46.151241,
    'longitude'=>14.995463,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Solomon Islands',
    'official_name'=>'Solomon Islands',
    'code'=>'SB',
    'capital'=>'Honiara',
    'region'=>'Oceania',
    'subregion'=>'Melanesia',
    'currency'=>'Solomon Islands Dollar',
    'currency_symbol'=>'SI$',
    'flag'=>'https://flagcdn.com/w320/sb.png',
    'latitude'=>-9.645710,
    'longitude'=>160.156194,
    'timezone'=>'UTC+11:00'
],

[
    'name'=>'Somalia',
    'official_name'=>'Federal Republic of Somalia',
    'code'=>'SO',
    'capital'=>'Mogadishu',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Somali Shilling',
    'currency_symbol'=>'Sh',
    'flag'=>'https://flagcdn.com/w320/so.png',
    'latitude'=>5.152149,
    'longitude'=>46.199616,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'South Africa',
    'official_name'=>'Republic of South Africa',
    'code'=>'ZA',
    'capital'=>'Pretoria',
    'region'=>'Africa',
    'subregion'=>'Southern Africa',
    'currency'=>'South African Rand',
    'currency_symbol'=>'R',
    'flag'=>'https://flagcdn.com/w320/za.png',
    'latitude'=>-30.559482,
    'longitude'=>22.937506,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'South Korea',
    'official_name'=>'Republic of Korea',
    'code'=>'KR',
    'capital'=>'Seoul',
    'region'=>'Asia',
    'subregion'=>'Eastern Asia',
    'currency'=>'South Korean Won',
    'currency_symbol'=>'₩',
    'flag'=>'https://flagcdn.com/w320/kr.png',
    'latitude'=>35.907757,
    'longitude'=>127.766922,
    'timezone'=>'UTC+09:00'
],

[
    'name'=>'South Sudan',
    'official_name'=>'Republic of South Sudan',
    'code'=>'SS',
    'capital'=>'Juba',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'South Sudanese Pound',
    'currency_symbol'=>'£',
    'flag'=>'https://flagcdn.com/w320/ss.png',
    'latitude'=>6.876991,
    'longitude'=>31.306979,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Spain',
    'official_name'=>'Kingdom of Spain',
    'code'=>'ES',
    'capital'=>'Madrid',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/es.png',
    'latitude'=>40.463667,
    'longitude'=>-3.749220,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Sri Lanka',
    'official_name'=>'Democratic Socialist Republic of Sri Lanka',
    'code'=>'LK',
    'capital'=>'Sri Jayawardenepura Kotte',
    'region'=>'Asia',
    'subregion'=>'Southern Asia',
    'currency'=>'Sri Lankan Rupee',
    'currency_symbol'=>'₨',
    'flag'=>'https://flagcdn.com/w320/lk.png',
    'latitude'=>7.873054,
    'longitude'=>80.771797,
    'timezone'=>'UTC+05:30'
],

[
    'name'=>'Sudan',
    'official_name'=>'Republic of the Sudan',
    'code'=>'SD',
    'capital'=>'Khartoum',
    'region'=>'Africa',
    'subregion'=>'Northern Africa',
    'currency'=>'Sudanese Pound',
    'currency_symbol'=>'ج.س.',
    'flag'=>'https://flagcdn.com/w320/sd.png',
    'latitude'=>12.862807,
    'longitude'=>30.217636,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Suriname',
    'official_name'=>'Republic of Suriname',
    'code'=>'SR',
    'capital'=>'Paramaribo',
    'region'=>'Americas',
    'subregion'=>'South America',
    'currency'=>'Surinamese Dollar',
    'currency_symbol'=>'Sr$',
    'flag'=>'https://flagcdn.com/w320/sr.png',
    'latitude'=>3.919305,
    'longitude'=>-56.027783,
    'timezone'=>'UTC-03:00'
],

[
    'name'=>'Sweden',
    'official_name'=>'Kingdom of Sweden',
    'code'=>'SE',
    'capital'=>'Stockholm',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Swedish Krona',
    'currency_symbol'=>'kr',
    'flag'=>'https://flagcdn.com/w320/se.png',
    'latitude'=>60.128161,
    'longitude'=>18.643501,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Switzerland',
    'official_name'=>'Swiss Confederation',
    'code'=>'CH',
    'capital'=>'Bern',
    'region'=>'Europe',
    'subregion'=>'Western Europe',
    'currency'=>'Swiss Franc',
    'currency_symbol'=>'CHF',
    'flag'=>'https://flagcdn.com/w320/ch.png',
    'latitude'=>46.818188,
    'longitude'=>8.227512,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Syria',
    'official_name'=>'Syrian Arab Republic',
    'code'=>'SY',
    'capital'=>'Damascus',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Syrian Pound',
    'currency_symbol'=>'£',
    'flag'=>'https://flagcdn.com/w320/sy.png',
    'latitude'=>34.802075,
    'longitude'=>38.996815,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Taiwan',
    'official_name'=>'Republic of China',
    'code'=>'TW',
    'capital'=>'Taipei',
    'region'=>'Asia',
    'subregion'=>'Eastern Asia',
    'currency'=>'New Taiwan Dollar',
    'currency_symbol'=>'NT$',
    'flag'=>'https://flagcdn.com/w320/tw.png',
    'latitude'=>23.697810,
    'longitude'=>120.960515,
    'timezone'=>'UTC+08:00'
],

[
    'name'=>'Tajikistan',
    'official_name'=>'Republic of Tajikistan',
    'code'=>'TJ',
    'capital'=>'Dushanbe',
    'region'=>'Asia',
    'subregion'=>'Central Asia',
    'currency'=>'Somoni',
    'currency_symbol'=>'ЅМ',
    'flag'=>'https://flagcdn.com/w320/tj.png',
    'latitude'=>38.861034,
    'longitude'=>71.276093,
    'timezone'=>'UTC+05:00'
],

[
    'name'=>'Tanzania',
    'official_name'=>'United Republic of Tanzania',
    'code'=>'TZ',
    'capital'=>'Dodoma',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Tanzanian Shilling',
    'currency_symbol'=>'TSh',
    'flag'=>'https://flagcdn.com/w320/tz.png',
    'latitude'=>-6.369028,
    'longitude'=>34.888822,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Thailand',
    'official_name'=>'Kingdom of Thailand',
    'code'=>'TH',
    'capital'=>'Bangkok',
    'region'=>'Asia',
    'subregion'=>'South-Eastern Asia',
    'currency'=>'Baht',
    'currency_symbol'=>'฿',
    'flag'=>'https://flagcdn.com/w320/th.png',
    'latitude'=>15.870032,
    'longitude'=>100.992541,
    'timezone'=>'UTC+07:00'
],

[
    'name'=>'Timor-Leste',
    'official_name'=>'Democratic Republic of Timor-Leste',
    'code'=>'TL',
    'capital'=>'Dili',
    'region'=>'Asia',
    'subregion'=>'South-Eastern Asia',
    'currency'=>'United States Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/tl.png',
    'latitude'=>-8.874217,
    'longitude'=>125.727539,
    'timezone'=>'UTC+09:00'
],

[
    'name'=>'Togo',
    'official_name'=>'Togolese Republic',
    'code'=>'TG',
    'capital'=>'Lomé',
    'region'=>'Africa',
    'subregion'=>'Western Africa',
    'currency'=>'West African CFA Franc',
    'currency_symbol'=>'CFA',
    'flag'=>'https://flagcdn.com/w320/tg.png',
    'latitude'=>8.619543,
    'longitude'=>0.824782,
    'timezone'=>'UTC+00:00'
],
[
    'name'=>'Tonga',
    'official_name'=>'Kingdom of Tonga',
    'code'=>'TO',
    'capital'=>'Nukuʻalofa',
    'region'=>'Oceania',
    'subregion'=>'Polynesia',
    'currency'=>'Paʻanga',
    'currency_symbol'=>'T$',
    'flag'=>'https://flagcdn.com/w320/to.png',
    'latitude'=>-21.178986,
    'longitude'=>-175.198242,
    'timezone'=>'UTC+13:00'
],

[
    'name'=>'Trinidad and Tobago',
    'official_name'=>'Republic of Trinidad and Tobago',
    'code'=>'TT',
    'capital'=>'Port of Spain',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Trinidad and Tobago Dollar',
    'currency_symbol'=>'TT$',
    'flag'=>'https://flagcdn.com/w320/tt.png',
    'latitude'=>10.691803,
    'longitude'=>-61.222503,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Tunisia',
    'official_name'=>'Republic of Tunisia',
    'code'=>'TN',
    'capital'=>'Tunis',
    'region'=>'Africa',
    'subregion'=>'Northern Africa',
    'currency'=>'Tunisian Dinar',
    'currency_symbol'=>'د.ت',
    'flag'=>'https://flagcdn.com/w320/tn.png',
    'latitude'=>33.886917,
    'longitude'=>9.537499,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Turkey',
    'official_name'=>'Republic of Türkiye',
    'code'=>'TR',
    'capital'=>'Ankara',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Turkish Lira',
    'currency_symbol'=>'₺',
    'flag'=>'https://flagcdn.com/w320/tr.png',
    'latitude'=>38.963745,
    'longitude'=>35.243322,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Turkmenistan',
    'official_name'=>'Turkmenistan',
    'code'=>'TM',
    'capital'=>'Ashgabat',
    'region'=>'Asia',
    'subregion'=>'Central Asia',
    'currency'=>'Turkmen Manat',
    'currency_symbol'=>'m',
    'flag'=>'https://flagcdn.com/w320/tm.png',
    'latitude'=>38.969719,
    'longitude'=>59.556278,
    'timezone'=>'UTC+05:00'
],

[
    'name'=>'Tuvalu',
    'official_name'=>'Tuvalu',
    'code'=>'TV',
    'capital'=>'Funafuti',
    'region'=>'Oceania',
    'subregion'=>'Polynesia',
    'currency'=>'Australian Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/tv.png',
    'latitude'=>-7.109535,
    'longitude'=>177.649330,
    'timezone'=>'UTC+12:00'
],

[
    'name'=>'Uganda',
    'official_name'=>'Republic of Uganda',
    'code'=>'UG',
    'capital'=>'Kampala',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Ugandan Shilling',
    'currency_symbol'=>'USh',
    'flag'=>'https://flagcdn.com/w320/ug.png',
    'latitude'=>1.373333,
    'longitude'=>32.290275,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Ukraine',
    'official_name'=>'Ukraine',
    'code'=>'UA',
    'capital'=>'Kyiv',
    'region'=>'Europe',
    'subregion'=>'Eastern Europe',
    'currency'=>'Hryvnia',
    'currency_symbol'=>'₴',
    'flag'=>'https://flagcdn.com/w320/ua.png',
    'latitude'=>48.379433,
    'longitude'=>31.165580,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'United Arab Emirates',
    'official_name'=>'United Arab Emirates',
    'code'=>'AE',
    'capital'=>'Abu Dhabi',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'UAE Dirham',
    'currency_symbol'=>'د.إ',
    'flag'=>'https://flagcdn.com/w320/ae.png',
    'latitude'=>23.424076,
    'longitude'=>53.847818,
    'timezone'=>'UTC+04:00'
],

[
    'name'=>'United Kingdom',
    'official_name'=>'United Kingdom of Great Britain and Northern Ireland',
    'code'=>'GB',
    'capital'=>'London',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Pound Sterling',
    'currency_symbol'=>'£',
    'flag'=>'https://flagcdn.com/w320/gb.png',
    'latitude'=>55.378051,
    'longitude'=>-3.435973,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'United States',
    'official_name'=>'United States of America',
    'code'=>'US',
    'capital'=>'Washington, D.C.',
    'region'=>'Americas',
    'subregion'=>'North America',
    'currency'=>'US Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/us.png',
    'latitude'=>37.090240,
    'longitude'=>-95.712891,
    'timezone'=>'UTC-05:00'
],

[
    'name'=>'Uruguay',
    'official_name'=>'Oriental Republic of Uruguay',
    'code'=>'UY',
    'capital'=>'Montevideo',
    'region'=>'Americas',
    'subregion'=>'South America',
    'currency'=>'Uruguayan Peso',
    'currency_symbol'=>'$U',
    'flag'=>'https://flagcdn.com/w320/uy.png',
    'latitude'=>-32.522779,
    'longitude'=>-55.765835,
    'timezone'=>'UTC-03:00'
],

[
    'name'=>'Uzbekistan',
    'official_name'=>'Republic of Uzbekistan',
    'code'=>'UZ',
    'capital'=>'Tashkent',
    'region'=>'Asia',
    'subregion'=>'Central Asia',
    'currency'=>'Uzbekistani Soʻm',
    'currency_symbol'=>'soʻm',
    'flag'=>'https://flagcdn.com/w320/uz.png',
    'latitude'=>41.377491,
    'longitude'=>64.585262,
    'timezone'=>'UTC+05:00'
],

[
    'name'=>'Vanuatu',
    'official_name'=>'Republic of Vanuatu',
    'code'=>'VU',
    'capital'=>'Port Vila',
    'region'=>'Oceania',
    'subregion'=>'Melanesia',
    'currency'=>'Vatu',
    'currency_symbol'=>'VT',
    'flag'=>'https://flagcdn.com/w320/vu.png',
    'latitude'=>-15.376706,
    'longitude'=>166.959158,
    'timezone'=>'UTC+11:00'
],

[
    'name'=>'Vatican City',
    'official_name'=>'Vatican City State',
    'code'=>'VA',
    'capital'=>'Vatican City',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/va.png',
    'latitude'=>41.902916,
    'longitude'=>12.453389,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Venezuela',
    'official_name'=>'Bolivarian Republic of Venezuela',
    'code'=>'VE',
    'capital'=>'Caracas',
    'region'=>'Americas',
    'subregion'=>'South America',
    'currency'=>'Bolívar',
    'currency_symbol'=>'Bs.',
    'flag'=>'https://flagcdn.com/w320/ve.png',
    'latitude'=>6.423750,
    'longitude'=>-66.589730,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Vietnam',
    'official_name'=>'Socialist Republic of Vietnam',
    'code'=>'VN',
    'capital'=>'Hanoi',
    'region'=>'Asia',
    'subregion'=>'South-Eastern Asia',
    'currency'=>'Vietnamese Đồng',
    'currency_symbol'=>'₫',
    'flag'=>'https://flagcdn.com/w320/vn.png',
    'latitude'=>14.058324,
    'longitude'=>108.277199,
    'timezone'=>'UTC+07:00'
],

[
    'name'=>'Yemen',
    'official_name'=>'Republic of Yemen',
    'code'=>'YE',
    'capital'=>'Sana\'a',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Yemeni Rial',
    'currency_symbol'=>'﷼',
    'flag'=>'https://flagcdn.com/w320/ye.png',
    'latitude'=>15.552727,
    'longitude'=>48.516388,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Zambia',
    'official_name'=>'Republic of Zambia',
    'code'=>'ZM',
    'capital'=>'Lusaka',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Zambian Kwacha',
    'currency_symbol'=>'ZK',
    'flag'=>'https://flagcdn.com/w320/zm.png',
    'latitude'=>-13.133897,
    'longitude'=>27.849332,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Zimbabwe',
    'official_name'=>'Republic of Zimbabwe',
    'code'=>'ZW',
    'capital'=>'Harare',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Zimbabwe Gold',
    'currency_symbol'=>'ZiG',
    'flag'=>'https://flagcdn.com/w320/zw.png',
    'latitude'=>-19.015438,
    'longitude'=>29.154857,
    'timezone'=>'UTC+02:00'
],
[
    'name'=>'American Samoa',
    'official_name'=>'American Samoa',
    'code'=>'AS',
    'capital'=>'Pago Pago',
    'region'=>'Oceania',
    'subregion'=>'Polynesia',
    'currency'=>'US Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/as.png',
    'latitude'=>-14.270972,
    'longitude'=>-170.132217,
    'timezone'=>'UTC-11:00'
],

[
    'name'=>'Anguilla',
    'official_name'=>'Anguilla',
    'code'=>'AI',
    'capital'=>'The Valley',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'East Caribbean Dollar',
    'currency_symbol'=>'EC$',
    'flag'=>'https://flagcdn.com/w320/ai.png',
    'latitude'=>18.220554,
    'longitude'=>-63.068615,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Aruba',
    'official_name'=>'Aruba',
    'code'=>'AW',
    'capital'=>'Oranjestad',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Aruban Florin',
    'currency_symbol'=>'ƒ',
    'flag'=>'https://flagcdn.com/w320/aw.png',
    'latitude'=>12.521110,
    'longitude'=>-69.968338,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Bermuda',
    'official_name'=>'Bermuda',
    'code'=>'BM',
    'capital'=>'Hamilton',
    'region'=>'Americas',
    'subregion'=>'North America',
    'currency'=>'Bermudian Dollar',
    'currency_symbol'=>'BD$',
    'flag'=>'https://flagcdn.com/w320/bm.png',
    'latitude'=>32.307800,
    'longitude'=>-64.750500,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'British Virgin Islands',
    'official_name'=>'Virgin Islands',
    'code'=>'VG',
    'capital'=>'Road Town',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'US Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/vg.png',
    'latitude'=>18.420695,
    'longitude'=>-64.639968,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Cayman Islands',
    'official_name'=>'Cayman Islands',
    'code'=>'KY',
    'capital'=>'George Town',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Cayman Islands Dollar',
    'currency_symbol'=>'CI$',
    'flag'=>'https://flagcdn.com/w320/ky.png',
    'latitude'=>19.313300,
    'longitude'=>-81.254600,
    'timezone'=>'UTC-05:00'
],

[
    'name'=>'Christmas Island',
    'official_name'=>'Territory of Christmas Island',
    'code'=>'CX',
    'capital'=>'Flying Fish Cove',
    'region'=>'Oceania',
    'subregion'=>'Australia and New Zealand',
    'currency'=>'Australian Dollar',
    'currency_symbol'=>'A$',
    'flag'=>'https://flagcdn.com/w320/cx.png',
    'latitude'=>-10.447525,
    'longitude'=>105.690449,
    'timezone'=>'UTC+07:00'
],

[
    'name'=>'Cocos (Keeling) Islands',
    'official_name'=>'Territory of Cocos (Keeling) Islands',
    'code'=>'CC',
    'capital'=>'West Island',
    'region'=>'Oceania',
    'subregion'=>'Australia and New Zealand',
    'currency'=>'Australian Dollar',
    'currency_symbol'=>'A$',
    'flag'=>'https://flagcdn.com/w320/cc.png',
    'latitude'=>-12.164165,
    'longitude'=>96.870956,
    'timezone'=>'UTC+06:30'
],

[
    'name'=>'Cook Islands',
    'official_name'=>'Cook Islands',
    'code'=>'CK',
    'capital'=>'Avarua',
    'region'=>'Oceania',
    'subregion'=>'Polynesia',
    'currency'=>'New Zealand Dollar',
    'currency_symbol'=>'NZ$',
    'flag'=>'https://flagcdn.com/w320/ck.png',
    'latitude'=>-21.236736,
    'longitude'=>-159.777671,
    'timezone'=>'UTC-10:00'
],

[
    'name'=>'Curaçao',
    'official_name'=>'Country of Curaçao',
    'code'=>'CW',
    'capital'=>'Willemstad',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Netherlands Antillean Guilder',
    'currency_symbol'=>'ƒ',
    'flag'=>'https://flagcdn.com/w320/cw.png',
    'latitude'=>12.169570,
    'longitude'=>-68.990020,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Faroe Islands',
    'official_name'=>'Faroe Islands',
    'code'=>'FO',
    'capital'=>'Tórshavn',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Danish Krone',
    'currency_symbol'=>'kr',
    'flag'=>'https://flagcdn.com/w320/fo.png',
    'latitude'=>61.892635,
    'longitude'=>-6.911806,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'French Guiana',
    'official_name'=>'French Guiana',
    'code'=>'GF',
    'capital'=>'Cayenne',
    'region'=>'Americas',
    'subregion'=>'South America',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/gf.png',
    'latitude'=>3.933889,
    'longitude'=>-53.125782,
    'timezone'=>'UTC-03:00'
],

[
    'name'=>'French Polynesia',
    'official_name'=>'French Polynesia',
    'code'=>'PF',
    'capital'=>'Papeete',
    'region'=>'Oceania',
    'subregion'=>'Polynesia',
    'currency'=>'CFP Franc',
    'currency_symbol'=>'₣',
    'flag'=>'https://flagcdn.com/w320/pf.png',
    'latitude'=>-17.679742,
    'longitude'=>-149.406843,
    'timezone'=>'UTC-10:00'
],

[
    'name'=>'Gibraltar',
    'official_name'=>'Gibraltar',
    'code'=>'GI',
    'capital'=>'Gibraltar',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Gibraltar Pound',
    'currency_symbol'=>'£',
    'flag'=>'https://flagcdn.com/w320/gi.png',
    'latitude'=>36.140751,
    'longitude'=>-5.353585,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Greenland',
    'official_name'=>'Greenland',
    'code'=>'GL',
    'capital'=>'Nuuk',
    'region'=>'Americas',
    'subregion'=>'North America',
    'currency'=>'Danish Krone',
    'currency_symbol'=>'kr',
    'flag'=>'https://flagcdn.com/w320/gl.png',
    'latitude'=>71.706936,
    'longitude'=>-42.604303,
    'timezone'=>'UTC-03:00'
],

[
    'name'=>'Guadeloupe',
    'official_name'=>'Guadeloupe',
    'code'=>'GP',
    'capital'=>'Basse-Terre',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/gp.png',
    'latitude'=>16.995971,
    'longitude'=>-62.067641,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Guam',
    'official_name'=>'Guam',
    'code'=>'GU',
    'capital'=>'Hagåtña',
    'region'=>'Oceania',
    'subregion'=>'Micronesia',
    'currency'=>'US Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/gu.png',
    'latitude'=>13.444304,
    'longitude'=>144.793731,
    'timezone'=>'UTC+10:00'
],

[
    'name'=>'Guernsey',
    'official_name'=>'Bailiwick of Guernsey',
    'code'=>'GG',
    'capital'=>'Saint Peter Port',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Pound Sterling',
    'currency_symbol'=>'£',
    'flag'=>'https://flagcdn.com/w320/gg.png',
    'latitude'=>49.465691,
    'longitude'=>-2.585278,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Hong Kong',
    'official_name'=>'Hong Kong Special Administrative Region',
    'code'=>'HK',
    'capital'=>'Hong Kong',
    'region'=>'Asia',
    'subregion'=>'Eastern Asia',
    'currency'=>'Hong Kong Dollar',
    'currency_symbol'=>'HK$',
    'flag'=>'https://flagcdn.com/w320/hk.png',
    'latitude'=>22.319303,
    'longitude'=>114.169361,
    'timezone'=>'UTC+08:00'
],

[
    'name'=>'Isle of Man',
    'official_name'=>'Isle of Man',
    'code'=>'IM',
    'capital'=>'Douglas',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Pound Sterling',
    'currency_symbol'=>'£',
    'flag'=>'https://flagcdn.com/w320/im.png',
    'latitude'=>54.236107,
    'longitude'=>-4.548056,
    'timezone'=>'UTC+00:00'
],
[
    'name'=>'Jersey',
    'official_name'=>'Bailiwick of Jersey',
    'code'=>'JE',
    'capital'=>'Saint Helier',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Pound Sterling',
    'currency_symbol'=>'£',
    'flag'=>'https://flagcdn.com/w320/je.png',
    'latitude'=>49.214439,
    'longitude'=>-2.131250,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Kosovo',
    'official_name'=>'Republic of Kosovo',
    'code'=>'XK',
    'capital'=>'Pristina',
    'region'=>'Europe',
    'subregion'=>'Southern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/xk.png',
    'latitude'=>42.602636,
    'longitude'=>20.902977,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'Macau',
    'official_name'=>'Macao Special Administrative Region',
    'code'=>'MO',
    'capital'=>'Macau',
    'region'=>'Asia',
    'subregion'=>'Eastern Asia',
    'currency'=>'Macanese Pataca',
    'currency_symbol'=>'MOP$',
    'flag'=>'https://flagcdn.com/w320/mo.png',
    'latitude'=>22.198745,
    'longitude'=>113.543873,
    'timezone'=>'UTC+08:00'
],

[
    'name'=>'Martinique',
    'official_name'=>'Martinique',
    'code'=>'MQ',
    'capital'=>'Fort-de-France',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/mq.png',
    'latitude'=>14.641528,
    'longitude'=>-61.024174,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Mayotte',
    'official_name'=>'Mayotte',
    'code'=>'YT',
    'capital'=>'Mamoudzou',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/yt.png',
    'latitude'=>-12.827500,
    'longitude'=>45.166244,
    'timezone'=>'UTC+03:00'
],

[
    'name'=>'Montserrat',
    'official_name'=>'Montserrat',
    'code'=>'MS',
    'capital'=>'Brades',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'East Caribbean Dollar',
    'currency_symbol'=>'EC$',
    'flag'=>'https://flagcdn.com/w320/ms.png',
    'latitude'=>16.742498,
    'longitude'=>-62.187366,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'New Caledonia',
    'official_name'=>'New Caledonia',
    'code'=>'NC',
    'capital'=>'Nouméa',
    'region'=>'Oceania',
    'subregion'=>'Melanesia',
    'currency'=>'CFP Franc',
    'currency_symbol'=>'₣',
    'flag'=>'https://flagcdn.com/w320/nc.png',
    'latitude'=>-20.904305,
    'longitude'=>165.618042,
    'timezone'=>'UTC+11:00'
],

[
    'name'=>'Niue',
    'official_name'=>'Niue',
    'code'=>'NU',
    'capital'=>'Alofi',
    'region'=>'Oceania',
    'subregion'=>'Polynesia',
    'currency'=>'New Zealand Dollar',
    'currency_symbol'=>'NZ$',
    'flag'=>'https://flagcdn.com/w320/nu.png',
    'latitude'=>-19.054445,
    'longitude'=>-169.867233,
    'timezone'=>'UTC-11:00'
],

[
    'name'=>'Norfolk Island',
    'official_name'=>'Norfolk Island',
    'code'=>'NF',
    'capital'=>'Kingston',
    'region'=>'Oceania',
    'subregion'=>'Australia and New Zealand',
    'currency'=>'Australian Dollar',
    'currency_symbol'=>'A$',
    'flag'=>'https://flagcdn.com/w320/nf.png',
    'latitude'=>-29.040835,
    'longitude'=>167.954712,
    'timezone'=>'UTC+11:00'
],

[
    'name'=>'Northern Mariana Islands',
    'official_name'=>'Commonwealth of the Northern Mariana Islands',
    'code'=>'MP',
    'capital'=>'Saipan',
    'region'=>'Oceania',
    'subregion'=>'Micronesia',
    'currency'=>'US Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/mp.png',
    'latitude'=>15.097900,
    'longitude'=>145.673874,
    'timezone'=>'UTC+10:00'
],

[
    'name'=>'Pitcairn Islands',
    'official_name'=>'Pitcairn, Henderson, Ducie and Oeno Islands',
    'code'=>'PN',
    'capital'=>'Adamstown',
    'region'=>'Oceania',
    'subregion'=>'Polynesia',
    'currency'=>'New Zealand Dollar',
    'currency_symbol'=>'NZ$',
    'flag'=>'https://flagcdn.com/w320/pn.png',
    'latitude'=>-24.703615,
    'longitude'=>-127.439308,
    'timezone'=>'UTC-08:00'
],

[
    'name'=>'Puerto Rico',
    'official_name'=>'Commonwealth of Puerto Rico',
    'code'=>'PR',
    'capital'=>'San Juan',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'US Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/pr.png',
    'latitude'=>18.220833,
    'longitude'=>-66.590149,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Réunion',
    'official_name'=>'Réunion',
    'code'=>'RE',
    'capital'=>'Saint-Denis',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/re.png',
    'latitude'=>-21.115141,
    'longitude'=>55.536384,
    'timezone'=>'UTC+04:00'
],

[
    'name'=>'Saint Barthélemy',
    'official_name'=>'Collectivity of Saint Barthélemy',
    'code'=>'BL',
    'capital'=>'Gustavia',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/bl.png',
    'latitude'=>17.900000,
    'longitude'=>-62.833333,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Saint Martin',
    'official_name'=>'Collectivity of Saint Martin',
    'code'=>'MF',
    'capital'=>'Marigot',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/mf.png',
    'latitude'=>18.070829,
    'longitude'=>-63.050080,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Saint Pierre and Miquelon',
    'official_name'=>'Saint Pierre and Miquelon',
    'code'=>'PM',
    'capital'=>'Saint-Pierre',
    'region'=>'Americas',
    'subregion'=>'North America',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/pm.png',
    'latitude'=>46.885200,
    'longitude'=>-56.315900,
    'timezone'=>'UTC-03:00'
],

[
    'name'=>'Sint Maarten',
    'official_name'=>'Sint Maarten',
    'code'=>'SX',
    'capital'=>'Philipsburg',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'Netherlands Antillean Guilder',
    'currency_symbol'=>'ƒ',
    'flag'=>'https://flagcdn.com/w320/sx.png',
    'latitude'=>18.042480,
    'longitude'=>-63.054830,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Tokelau',
    'official_name'=>'Tokelau',
    'code'=>'TK',
    'capital'=>'Fakaofo',
    'region'=>'Oceania',
    'subregion'=>'Polynesia',
    'currency'=>'New Zealand Dollar',
    'currency_symbol'=>'NZ$',
    'flag'=>'https://flagcdn.com/w320/tk.png',
    'latitude'=>-9.200200,
    'longitude'=>-171.848400,
    'timezone'=>'UTC+13:00'
],

[
    'name'=>'Turks and Caicos Islands',
    'official_name'=>'Turks and Caicos Islands',
    'code'=>'TC',
    'capital'=>'Cockburn Town',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'US Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/tc.png',
    'latitude'=>21.694025,
    'longitude'=>-71.797928,
    'timezone'=>'UTC-05:00'
],

[
    'name'=>'U.S. Virgin Islands',
    'official_name'=>'Virgin Islands of the United States',
    'code'=>'VI',
    'capital'=>'Charlotte Amalie',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'US Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/vi.png',
    'latitude'=>18.335765,
    'longitude'=>-64.896335,
    'timezone'=>'UTC-04:00'
],
[
    'name'=>'Wallis and Futuna',
    'official_name'=>'Territory of the Wallis and Futuna Islands',
    'code'=>'WF',
    'capital'=>'Mata-Utu',
    'region'=>'Oceania',
    'subregion'=>'Polynesia',
    'currency'=>'CFP Franc',
    'currency_symbol'=>'₣',
    'flag'=>'https://flagcdn.com/w320/wf.png',
    'latitude'=>-13.768752,
    'longitude'=>-177.156097,
    'timezone'=>'UTC+12:00'
],

[
    'name'=>'Western Sahara',
    'official_name'=>'Sahrawi Arab Democratic Republic',
    'code'=>'EH',
    'capital'=>'El Aaiún',
    'region'=>'Africa',
    'subregion'=>'Northern Africa',
    'currency'=>'Moroccan Dirham',
    'currency_symbol'=>'MAD',
    'flag'=>'https://flagcdn.com/w320/eh.png',
    'latitude'=>24.215527,
    'longitude'=>-12.885834,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Åland Islands',
    'official_name'=>'Åland Islands',
    'code'=>'AX',
    'capital'=>'Mariehamn',
    'region'=>'Europe',
    'subregion'=>'Northern Europe',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/ax.png',
    'latitude'=>60.178525,
    'longitude'=>19.915610,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Antarctica',
    'official_name'=>'Antarctica',
    'code'=>'AQ',
    'capital'=>'',
    'region'=>'Antarctica',
    'subregion'=>'Antarctica',
    'currency'=>'',
    'currency_symbol'=>'',
    'flag'=>'https://flagcdn.com/w320/aq.png',
    'latitude'=>-82.862752,
    'longitude'=>135.000000,
    'timezone'=>'UTC+00:00'
],

[
    'name'=>'Bouvet Island',
    'official_name'=>'Bouvet Island',
    'code'=>'BV',
    'capital'=>'',
    'region'=>'Antarctica',
    'subregion'=>'Antarctica',
    'currency'=>'Norwegian Krone',
    'currency_symbol'=>'kr',
    'flag'=>'https://flagcdn.com/w320/bv.png',
    'latitude'=>-54.420790,
    'longitude'=>3.346450,
    'timezone'=>'UTC+01:00'
],

[
    'name'=>'British Indian Ocean Territory',
    'official_name'=>'British Indian Ocean Territory',
    'code'=>'IO',
    'capital'=>'Diego Garcia',
    'region'=>'Africa',
    'subregion'=>'Eastern Africa',
    'currency'=>'US Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/io.png',
    'latitude'=>-6.343194,
    'longitude'=>71.876519,
    'timezone'=>'UTC+06:00'
],

[
    'name'=>'French Southern Territories',
    'official_name'=>'French Southern and Antarctic Lands',
    'code'=>'TF',
    'capital'=>'Port-aux-Français',
    'region'=>'Antarctica',
    'subregion'=>'Antarctica',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/tf.png',
    'latitude'=>-49.280366,
    'longitude'=>69.348557,
    'timezone'=>'UTC+05:00'
],

[
    'name'=>'Heard Island and McDonald Islands',
    'official_name'=>'Heard Island and McDonald Islands',
    'code'=>'HM',
    'capital'=>'',
    'region'=>'Antarctica',
    'subregion'=>'Antarctica',
    'currency'=>'Australian Dollar',
    'currency_symbol'=>'A$',
    'flag'=>'https://flagcdn.com/w320/hm.png',
    'latitude'=>-53.081810,
    'longitude'=>73.504158,
    'timezone'=>'UTC+05:00'
],

[
    'name'=>'Saba',
    'official_name'=>'Saba',
    'code'=>'BQ',
    'capital'=>'The Bottom',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'US Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/bq.png',
    'latitude'=>17.635464,
    'longitude'=>-63.232676,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Bonaire',
    'official_name'=>'Bonaire',
    'code'=>'BQ',
    'capital'=>'Kralendijk',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'US Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/bq.png',
    'latitude'=>12.201890,
    'longitude'=>-68.262383,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'Sint Eustatius',
    'official_name'=>'Sint Eustatius',
    'code'=>'BQ',
    'capital'=>'Oranjestad',
    'region'=>'Americas',
    'subregion'=>'Caribbean',
    'currency'=>'US Dollar',
    'currency_symbol'=>'$',
    'flag'=>'https://flagcdn.com/w320/bq.png',
    'latitude'=>17.489030,
    'longitude'=>-62.973557,
    'timezone'=>'UTC-04:00'
],

[
    'name'=>'South Georgia and the South Sandwich Islands',
    'official_name'=>'South Georgia and the South Sandwich Islands',
    'code'=>'GS',
    'capital'=>'King Edward Point',
    'region'=>'Antarctica',
    'subregion'=>'Antarctica',
    'currency'=>'Pound Sterling',
    'currency_symbol'=>'£',
    'flag'=>'https://flagcdn.com/w320/gs.png',
    'latitude'=>-54.429579,
    'longitude'=>-36.587909,
    'timezone'=>'UTC-02:00'
],

[
    'name'=>'Falkland Islands',
    'official_name'=>'Falkland Islands',
    'code'=>'FK',
    'capital'=>'Stanley',
    'region'=>'Americas',
    'subregion'=>'South America',
    'currency'=>'Falkland Islands Pound',
    'currency_symbol'=>'£',
    'flag'=>'https://flagcdn.com/w320/fk.png',
    'latitude'=>-51.796253,
    'longitude'=>-59.523613,
    'timezone'=>'UTC-03:00'
],

[
    'name'=>'Palestinian Territories',
    'official_name'=>'State of Palestine',
    'code'=>'PS',
    'capital'=>'East Jerusalem',
    'region'=>'Asia',
    'subregion'=>'Western Asia',
    'currency'=>'Israeli New Shekel',
    'currency_symbol'=>'₪',
    'flag'=>'https://flagcdn.com/w320/ps.png',
    'latitude'=>31.952162,
    'longitude'=>35.233154,
    'timezone'=>'UTC+02:00'
],

[
    'name'=>'Clipperton Island',
    'official_name'=>'Clipperton Island',
    'code'=>'CP',
    'capital'=>'',
    'region'=>'Americas',
    'subregion'=>'North America',
    'currency'=>'Euro',
    'currency_symbol'=>'€',
    'flag'=>'https://flagcdn.com/w320/fr.png',
    'latitude'=>10.298000,
    'longitude'=>-109.215000,
    'timezone'=>'UTC-08:00'
],

        ];

        foreach ($countries as $country) {
            Country::updateOrCreate(
                ['code' => $country['code']],
                $country
            );
        }
    }
}