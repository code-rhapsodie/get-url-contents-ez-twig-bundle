<?php

class GetUrlContentsOperator
{
    public function operatorList()
    {
        return array('get_url_contents');
    }

    public function namedParameterPerOperator()
    {
        return true;
    }

    public function namedParameterList()
    {
        return array(
            'get_url_contents' => array(
                'url' => array(
                    'type' => 'string',
                    'required' => true,
                ),
            ),
        );
    }

    public function modify(&$tpl, &$operatorName, &$operatorParameters, &$rootNamespace, &$currentNamespace, &$operatorValue, &$namedParameters)
    {
        $ch = curl_init($namedParameters['url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        $content = curl_exec($ch);
        $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        if ($content === false || $code !== 200) {
            $operatorValue = '';

            return;
        }

        $operatorValue = $content;
    }
}
