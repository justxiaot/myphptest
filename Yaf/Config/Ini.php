<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/4/29
 * Time: 9:54
 */

namespace Yaf\Config;

use Yaf\Exception;


class Ini extends Simple {

    public function __construct($filename, $section = null) {
        if (empty($filename)) {
            Exception::trigger_error(
                'Unable to find config file'.$filename, E_USER_ERROR);
        }
        if (is_array($filename)) {
            $this->_config = $filename;
        } elseif (is_string($filename)) {
            $iniArray = $this->_loadIniFile($filename);

            if (null === $section) {
                $dataArray = [];
                foreach ($iniArray as $sectionName=>$sectionData) {
                    if (!is_array($sectionData)) {
                        $dataArray = $this->_arrayMergeRecursive($dataArray,
                            $this->_processKey([], $sectionName, $sectionData));
                    } else {
                        $dataArray[$sectionName] = $this->_processSection(
                            $iniArray, $sectionName
                        );
                    }
                }
                parent::__construct($dataArray, true);
            } else {

            }
        }

    }

    protected function _loadIniFile($filename) {
        $loaded = $this->_parseIniFile($filename);
        $iniArray = [];
        foreach ($loaded as $key=>$data) {
            $pieces = explode(':', $key);
            $thisSection = trim($pieces[0]);
            switch (count($pieces)) {
                case 1:
                    $iniArray[$thisSection] = $data;
                    break;
                case 2:
                    $extendedSection = trim($pieces[1]);
                    $iniArray[$thisSection] = array_merge(
                        array(';extends'=>$extendedSection), $data);
                    break;
                default:
                    throw new Exception(
                        "Section '$thisSection' may not extend ".
                        "multiple sections in $filename"
                    );
            }
        }
        return $iniArray;
    }

    protected function _parseIniFile($filename) {
        return parse_ini_file($filename, true);
    }
}