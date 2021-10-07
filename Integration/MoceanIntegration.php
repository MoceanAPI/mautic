<?php
namespace MauticPlugin\MoceanApiBroadcastBundle\Integration;

use Mautic\PluginBundle\Integration\AbstractIntegration;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MoceanIntegration extends AbstractIntegration
{
    public function getName() 
    {
        return 'Mocean';
    }

    public function getDisplayName(): string
    {
        return 'MoceanAPI Broadcast';
    }

    public function getIcon()
    {
        return 'plugins/MoceanApiBroadcastBundle/Assets/img/mocean.png';
    }
    
    public function getAuthenticationType() 
    {
        return 'none';
    }
    
    public function getRequiredKeyFields()
    {
        return [
            $this->getClientIdKey() => 'mautic.integration.mocean.api_key',
            $this->getClientSecretKey() => 'mautic.integration.mocean.api_secret',
        ];
    }
    
    public function getClientIdKey()
    {
        return 'api_key';
    }

    public function getClientSecretKey()
    {
        return 'api_secret';
    }
    
    public function appendToForm(&$builder, $data, $formArea)
    {
        //Message From input
        if ('keys' === $formArea) {
            $builder->add(
                'sender',
                TextType::class,
                [
                    'label'      => 'mautic.plugin.mocean.sender',
                    'attr'        => [
                        'class'        => 'form-control',
                        'tooltip' => 'mautic.plugin.mocean.sender.tooltip',
                    ],
                    'required' => true,
                ]
            );
            
            //Default country input
            $builder->add(
                'country_code',
                ChoiceType::class,
                [
                    'choices' => [
                        'mautic.plugin.mocean.countrycode' => '',
                        'mautic.plugin.mocean.countrycode_AF' => 'AF',
                        'mautic.plugin.mocean.countrycode_AL' => 'AL',
                        'mautic.plugin.mocean.countrycode_DZ' => 'DZ',
                        'mautic.plugin.mocean.countrycode_AS' => 'AS',
                        'mautic.plugin.mocean.countrycode_AD' => 'AD',
                        'mautic.plugin.mocean.countrycode_AO' => 'AO',
                        'mautic.plugin.mocean.countrycode_AI' => 'AI',
                        'mautic.plugin.mocean.countrycode_AG' => 'AG',
                        'mautic.plugin.mocean.countrycode_AR' => 'AR',
                        'mautic.plugin.mocean.countrycode_AM' => 'AM',
                        'mautic.plugin.mocean.countrycode_AW' => 'AW',
                        'mautic.plugin.mocean.countrycode_AU' => 'AU',
                        'mautic.plugin.mocean.countrycode_AT' => 'AT',
                        'mautic.plugin.mocean.countrycode_AZ' => 'AZ',
                        'mautic.plugin.mocean.countrycode_BH' => 'BH',
                        'mautic.plugin.mocean.countrycode_BD' => 'BD',
                        'mautic.plugin.mocean.countrycode_BB' => 'BB',
                        'mautic.plugin.mocean.countrycode_BY' => 'BY',
                        'mautic.plugin.mocean.countrycode_BE' => 'BE',
                        'mautic.plugin.mocean.countrycode_BZ' => 'BZ',
                        'mautic.plugin.mocean.countrycode_BJ' => 'BJ',
                        'mautic.plugin.mocean.countrycode_BM' => 'BM',
                        'mautic.plugin.mocean.countrycode_BT' => 'BT',
                        'mautic.plugin.mocean.countrycode_BO' => 'BO',
                        'mautic.plugin.mocean.countrycode_BA' => 'BA',
                        'mautic.plugin.mocean.countrycode_BW' => 'BW',
                        'mautic.plugin.mocean.countrycode_BR' => 'BR',
                        'mautic.plugin.mocean.countrycode_IO' => 'IO',
                        'mautic.plugin.mocean.countrycode_VG' => 'VG',
                        'mautic.plugin.mocean.countrycode_BN' => 'BN',
                        'mautic.plugin.mocean.countrycode_BG' => 'BG',
                        'mautic.plugin.mocean.countrycode_BF' => 'BF',
                        'mautic.plugin.mocean.countrycode_MM' => 'MM',
                        'mautic.plugin.mocean.countrycode_BI' => 'BI',
                        'mautic.plugin.mocean.countrycode_KH' => 'KH',
                        'mautic.plugin.mocean.countrycode_CM' => 'CM',
                        'mautic.plugin.mocean.countrycode_CA' => 'CA',
                        'mautic.plugin.mocean.countrycode_CV' => 'CV',
                        'mautic.plugin.mocean.countrycode_KY' => 'KY',
                        'mautic.plugin.mocean.countrycode_CF' => 'CF',
                        'mautic.plugin.mocean.countrycode_TD' => 'TD',
                        'mautic.plugin.mocean.countrycode_CL' => 'CL',
                        'mautic.plugin.mocean.countrycode_CN' => 'CN',
                        'mautic.plugin.mocean.countrycode_CO' => 'CO',
                        'mautic.plugin.mocean.countrycode_KM' => 'KM',
                        'mautic.plugin.mocean.countrycode_CK' => 'CK',
                        'mautic.plugin.mocean.countrycode_CR' => 'CR',
                        'mautic.plugin.mocean.countrycode_CI' => 'CI',
                        'mautic.plugin.mocean.countrycode_HR' => 'HR',
                        'mautic.plugin.mocean.countrycode_CU' => 'CU',
                        'mautic.plugin.mocean.countrycode_CY' => 'CY',
                        'mautic.plugin.mocean.countrycode_CZ' => 'CZ',
                        'mautic.plugin.mocean.countrycode_CD' => 'CD',
                        'mautic.plugin.mocean.countrycode_DK' => 'DK',
                        'mautic.plugin.mocean.countrycode_DJ' => 'DJ',
                        'mautic.plugin.mocean.countrycode_DM' => 'DM',
                        'mautic.plugin.mocean.countrycode_DO' => 'DO',
                        'mautic.plugin.mocean.countrycode_EC' => 'EC',
                        'mautic.plugin.mocean.countrycode_EG' => 'EG',
                        'mautic.plugin.mocean.countrycode_SV' => 'SV',
                        'mautic.plugin.mocean.countrycode_GQ' => 'GQ',
                        'mautic.plugin.mocean.countrycode_ER' => 'ER',
                        'mautic.plugin.mocean.countrycode_EE' => 'EE',
                        'mautic.plugin.mocean.countrycode_ET' => 'ET',
                        'mautic.plugin.mocean.countrycode_FK' => 'FK',
                        'mautic.plugin.mocean.countrycode_FO' => 'FO',
                        'mautic.plugin.mocean.countrycode_FM' => 'FM',
                        'mautic.plugin.mocean.countrycode_FJ' => 'FJ',
                        'mautic.plugin.mocean.countrycode_FI' => 'FI',
                        'mautic.plugin.mocean.countrycode_FR' => 'FR',
                        'mautic.plugin.mocean.countrycode_GF' => 'GF',
                        'mautic.plugin.mocean.countrycode_PF' => 'PF',
                        'mautic.plugin.mocean.countrycode_GA' => 'GA',
                        'mautic.plugin.mocean.countrycode_GE' => 'GE',
                        'mautic.plugin.mocean.countrycode_DE' => 'DE',
                        'mautic.plugin.mocean.countrycode_GH' => 'GH',
                        'mautic.plugin.mocean.countrycode_GI' => 'GI',
                        'mautic.plugin.mocean.countrycode_GR' => 'GR',
                        'mautic.plugin.mocean.countrycode_GL' => 'GL',
                        'mautic.plugin.mocean.countrycode_GD' => 'GD',
                        'mautic.plugin.mocean.countrycode_GP' => 'GP',
                        'mautic.plugin.mocean.countrycode_GU' => 'GU',
                        'mautic.plugin.mocean.countrycode_GT' => 'GT',
                        'mautic.plugin.mocean.countrycode_GN' => 'GN',
                        'mautic.plugin.mocean.countrycode_GW' => 'GW',
                        'mautic.plugin.mocean.countrycode_GY' => 'GY',
                        'mautic.plugin.mocean.countrycode_HT' => 'HT',
                        'mautic.plugin.mocean.countrycode_HN' => 'HN',
                        'mautic.plugin.mocean.countrycode_HK' => 'HK',
                        'mautic.plugin.mocean.countrycode_HU' => 'HU',
                        'mautic.plugin.mocean.countrycode_IS' => 'IS',
                        'mautic.plugin.mocean.countrycode_IN' => 'IN',
                        'mautic.plugin.mocean.countrycode_ID' => 'ID',
                        'mautic.plugin.mocean.countrycode_IR' => 'IR',
                        'mautic.plugin.mocean.countrycode_IQ' => 'IQ',
                        'mautic.plugin.mocean.countrycode_IE' => 'IE',
                        'mautic.plugin.mocean.countrycode_IL' => 'IL',
                        'mautic.plugin.mocean.countrycode_IT' => 'IT',
                        'mautic.plugin.mocean.countrycode_JM' => 'JM',
                        'mautic.plugin.mocean.countrycode_JP' => 'JP',
                        'mautic.plugin.mocean.countrycode_JO' => 'JO',
                        'mautic.plugin.mocean.countrycode_KZ' => 'KZ',
                        'mautic.plugin.mocean.countrycode_KE' => 'KE',
                        'mautic.plugin.mocean.countrycode_KI' => 'KI',
                        'mautic.plugin.mocean.countrycode_KW' => 'KW',
                        'mautic.plugin.mocean.countrycode_KG' => 'KG',
                        'mautic.plugin.mocean.countrycode_LA' => 'LA',
                        'mautic.plugin.mocean.countrycode_LV' => 'LV',
                        'mautic.plugin.mocean.countrycode_LB' => 'LB',
                        'mautic.plugin.mocean.countrycode_LS' => 'LS',
                        'mautic.plugin.mocean.countrycode_LR' => 'LR',
                        'mautic.plugin.mocean.countrycode_LY' => 'LY',
                        'mautic.plugin.mocean.countrycode_LI' => 'LI',
                        'mautic.plugin.mocean.countrycode_LT' => 'LT',
                        'mautic.plugin.mocean.countrycode_LU' => 'LU',
                        'mautic.plugin.mocean.countrycode_MO' => 'MO',
                        'mautic.plugin.mocean.countrycode_MK' => 'MK',
                        'mautic.plugin.mocean.countrycode_MG' => 'MG',
                        'mautic.plugin.mocean.countrycode_MW' => 'MW',
                        'mautic.plugin.mocean.countrycode_MY' => 'MY',
                        'mautic.plugin.mocean.countrycode_MV' => 'MV',
                        'mautic.plugin.mocean.countrycode_ML' => 'ML',
                        'mautic.plugin.mocean.countrycode_MT' => 'MT',
                        'mautic.plugin.mocean.countrycode_MH' => 'MH',
                        'mautic.plugin.mocean.countrycode_MQ' => 'MQ',
                        'mautic.plugin.mocean.countrycode_MR' => 'MR',
                        'mautic.plugin.mocean.countrycode_MU' => 'MU',
                        'mautic.plugin.mocean.countrycode_YT' => 'YT',
                        'mautic.plugin.mocean.countrycode_MX' => 'MX',
                        'mautic.plugin.mocean.countrycode_MD' => 'MD',
                        'mautic.plugin.mocean.countrycode_MC' => 'MC',
                        'mautic.plugin.mocean.countrycode_MN' => 'MN',
                        'mautic.plugin.mocean.countrycode_ME' => 'ME',
                        'mautic.plugin.mocean.countrycode_MS' => 'MS',
                        'mautic.plugin.mocean.countrycode_MA' => 'MA',
                        'mautic.plugin.mocean.countrycode_MZ' => 'MZ',
                        'mautic.plugin.mocean.countrycode_NA' => 'NA',
                        'mautic.plugin.mocean.countrycode_NR' => 'NR',
                        'mautic.plugin.mocean.countrycode_NP' => 'NP',
                        'mautic.plugin.mocean.countrycode_NL' => 'NL',
                        'mautic.plugin.mocean.countrycode_AN' => 'AN',
                        'mautic.plugin.mocean.countrycode_NC' => 'NC',
                        'mautic.plugin.mocean.countrycode_NZ' => 'NZ',
                        'mautic.plugin.mocean.countrycode_NI' => 'NI',
                        'mautic.plugin.mocean.countrycode_NE' => 'NE',
                        'mautic.plugin.mocean.countrycode_NG' => 'NG',
                        'mautic.plugin.mocean.countrycode_NU' => 'NU',
                        'mautic.plugin.mocean.countrycode_NF' => 'NF',
                        'mautic.plugin.mocean.countrycode_KP' => 'KP',
                        'mautic.plugin.mocean.countrycode_MP' => 'MP',
                        'mautic.plugin.mocean.countrycode_NO' => 'NO',
                        'mautic.plugin.mocean.countrycode_OM' => 'OM',
                        'mautic.plugin.mocean.countrycode_PK' => 'PK',
                        'mautic.plugin.mocean.countrycode_PW' => 'PW',
                        'mautic.plugin.mocean.countrycode_PS' => 'PS',
                        'mautic.plugin.mocean.countrycode_PA' => 'PA',
                        'mautic.plugin.mocean.countrycode_PG' => 'PG',
                        'mautic.plugin.mocean.countrycode_PY' => 'PY',
                        'mautic.plugin.mocean.countrycode_PE' => 'PE',
                        'mautic.plugin.mocean.countrycode_PH' => 'PH',
                        'mautic.plugin.mocean.countrycode_PL' => 'PL',
                        'mautic.plugin.mocean.countrycode_PT' => 'PT',
                        'mautic.plugin.mocean.countrycode_PR' => 'PR',
                        'mautic.plugin.mocean.countrycode_QA' => 'QA',
                        'mautic.plugin.mocean.countrycode_CG' => 'CG',
                        'mautic.plugin.mocean.countrycode_RE' => 'RE',
                        'mautic.plugin.mocean.countrycode_RO' => 'RO',
                        'mautic.plugin.mocean.countrycode_RU' => 'RU',
                        'mautic.plugin.mocean.countrycode_RW' => 'RW',
                        'mautic.plugin.mocean.countrycode_SH' => 'SH',
                        'mautic.plugin.mocean.countrycode_KN' => 'KN',
                        'mautic.plugin.mocean.countrycode_PM' => 'PM',
                        'mautic.plugin.mocean.countrycode_VC' => 'VC',
                        'mautic.plugin.mocean.countrycode_WS' => 'WS',
                        'mautic.plugin.mocean.countrycode_SM' => 'SM',
                        'mautic.plugin.mocean.countrycode_ST' => 'ST',
                        'mautic.plugin.mocean.countrycode_SA' => 'SA',
                        'mautic.plugin.mocean.countrycode_SN' => 'SN',
                        'mautic.plugin.mocean.countrycode_RS' => 'RS',
                        'mautic.plugin.mocean.countrycode_SC' => 'SC',
                        'mautic.plugin.mocean.countrycode_SL' => 'SL',
                        'mautic.plugin.mocean.countrycode_SG' => 'SG',
                        'mautic.plugin.mocean.countrycode_SK' => 'SK',
                        'mautic.plugin.mocean.countrycode_SI' => 'SI',
                        'mautic.plugin.mocean.countrycode_SB' => 'SB',
                        'mautic.plugin.mocean.countrycode_SO' => 'SO',
                        'mautic.plugin.mocean.countrycode_ZA' => 'ZA',
                        'mautic.plugin.mocean.countrycode_KR' => 'KR',
                        'mautic.plugin.mocean.countrycode_ES' => 'ES',
                        'mautic.plugin.mocean.countrycode_LK' => 'LK',
                        'mautic.plugin.mocean.countrycode_LC' => 'LC',
                        'mautic.plugin.mocean.countrycode_SD' => 'SD',
                        'mautic.plugin.mocean.countrycode_SR' => 'SR',
                        'mautic.plugin.mocean.countrycode_SZ' => 'SZ',
                        'mautic.plugin.mocean.countrycode_SE' => 'SE',
                        'mautic.plugin.mocean.countrycode_CH' => 'CH',
                        'mautic.plugin.mocean.countrycode_SY' => 'SY',
                        'mautic.plugin.mocean.countrycode_TW' => 'TW',
                        'mautic.plugin.mocean.countrycode_TJ' => 'TJ',
                        'mautic.plugin.mocean.countrycode_TZ' => 'TZ',
                        'mautic.plugin.mocean.countrycode_TH' => 'TH',
                        'mautic.plugin.mocean.countrycode_BS' => 'BS',
                        'mautic.plugin.mocean.countrycode_GM' => 'GM',
                        'mautic.plugin.mocean.countrycode_TL' => 'TL',
                        'mautic.plugin.mocean.countrycode_TG' => 'TG',
                        'mautic.plugin.mocean.countrycode_TK' => 'TK',
                        'mautic.plugin.mocean.countrycode_TO' => 'TO',
                        'mautic.plugin.mocean.countrycode_TT' => 'TT',
                        'mautic.plugin.mocean.countrycode_TN' => 'TN',
                        'mautic.plugin.mocean.countrycode_TR' => 'TR',
                        'mautic.plugin.mocean.countrycode_TM' => 'TM',
                        'mautic.plugin.mocean.countrycode_TC' => 'TC',
                        'mautic.plugin.mocean.countrycode_TV' => 'TV',
                        'mautic.plugin.mocean.countrycode_UG' => 'UG',
                        'mautic.plugin.mocean.countrycode_UA' => 'UA',
                        'mautic.plugin.mocean.countrycode_AE' => 'AE',
                        'mautic.plugin.mocean.countrycode_GB' => 'GB',
                        'mautic.plugin.mocean.countrycode_US' => 'US',
                        'mautic.plugin.mocean.countrycode_UY' => 'UY',
                        'mautic.plugin.mocean.countrycode_VI' => 'VI',
                        'mautic.plugin.mocean.countrycode_UZ' => 'UZ',
                        'mautic.plugin.mocean.countrycode_VU' => 'VU',
                        'mautic.plugin.mocean.countrycode_VA' => 'VA',
                        'mautic.plugin.mocean.countrycode_VE' => 'VE',
                        'mautic.plugin.mocean.countrycode_VN' => 'VN',
                        'mautic.plugin.mocean.countrycode_WF' => 'WF',
                        'mautic.plugin.mocean.countrycode_YE' => 'YE',
                        'mautic.plugin.mocean.countrycode_ZM' => 'ZM',
                        'mautic.plugin.mocean.countrycode_ZW' => 'ZW'
                    ],
                    'label'       => 'mautic.plugin.mocean.countrycode',
                    'placeholder' => false,
                    'attr'        => [
                        'tooltip' => 'mautic.plugin.mocean.country.tooltip'
                    ],
                ]
            );
        } 
    }
}