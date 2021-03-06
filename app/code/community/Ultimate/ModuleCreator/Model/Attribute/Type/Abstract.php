<?php 
/**
 * Ultimate_ModuleCreator extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE_UMC.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category       Ultimate
 * @package        Ultimate_ModuleCreator
 * @copyright      Copyright (c) 2013
 * @license        http://opensource.org/licenses/mit-license.php MIT License
 * @author         Marius Strajeru <ultimate.module.creator@gmail.com>
 */
/**
 * abstract attribute type
 *
 * @category    Ultimate
 * @package     Ultimate_ModuleCreator
 * @author      Marius Strajeru <ultimate.module.creator@gmail.com>
 */
class Ultimate_ModuleCreator_Model_Attribute_Type_Abstract
    extends Ultimate_ModuleCreator_Model_Abstract {
    /**
     * type code
     * @var string
     */
    protected $_type            = 'abstract';
    /**
     * attribute object
     * @var mixed
     */
    protected $_attribute       = null;
    /**
     * sql column ddl type
     * @var string
     */
    protected $_typeDdl         = 'TYPE_TEXT';
    /**
     * sql column ddl size
     * @var string
     */
    protected $_sizeDdl         = '255';

    /**
     * eav setup type
     */
    protected $_setupType       = 'varchar';
    /**
     * eav setup backend
     * @var string
     */
    protected $_setupBackend    = '';
    /**
     * eav setup input
     * @var string
     */
    protected $_setupInput 	    = 'text';
    /**
     * eav setup source
     * @var string
     */
    protected $_setupSource	    = '';

    /**
     * set the attribute
     * @param Ultimate_ModuleCreator_Model_Attribute $attribute
     * @return Ultimate_ModuleCreator_Model_Attribute_Type_Abstract
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function setAttribute(Ultimate_ModuleCreator_Model_Attribute $attribute) {
        $this->_attribute = $attribute;
        return $this;
    }

    /**
     * get attribute object
     * @access public
     * @return Ultimate_ModuleCreator_Model_Attribute|null
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getAttribute() {
        return $this->_attribute;
    }

    /**
     * check if attribute can be in admin grid
     * @access public
     * @return bool
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getAdminGrid() {
        return $this->getAttribute()->getData('admin_grid');
    }
    /**
     * get column options
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getAdminColumnOptions() {
        return '';
    }

    /**
     * get text for rss
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getRssText() {
        $attribute = $this->getAttribute();
        $module = $attribute->getEntity()->getModule()->getLowerModuleName();
        return $this->getPadding(3).'$'.'description .= \'<div>\'.Mage::helper(\''.$module.'\')->__(\''.$attribute->getLabel().'\').\': \'.$item->get'.$this->getAttribute()->getMagicMethodCode().'().\'</div>\';'.$this->getEol();
    }
    /**
     * get the type for the form
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getFormType() {
        return 'text';
    }
    /**
     * get column ddl type
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getTypeDdl() {
        return $this->_typeDdl;
    }
    /**
     * get column ddl size
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getSizeDdl() {
        return $this->_sizeDdl;
    }
    /**
     * get the html for frontend
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getFrontendHtml() {
        return '<?php echo Mage::helper(\''.strtolower($this->getAttribute()->getEntity()->getModule()->getModuleName()).'\')->__(\''.$this->getAttribute()->getLabel().'\');?>:<?php echo $_'.strtolower($this->getAttribute()->getEntity()->getNameSingular()).'->get'.$this->getAttribute()->getMagicMethodCode().'();?>'.$this->getHelper()->getEol();
    }
    /**
     * get the setup type
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getSetupType(){
        return $this->_setupType;
    }
    /**
     * get setup backend type
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getSetupBackend(){
        return $this->_setupBackend;
    }
    /**
     * get the setup input
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getSetupInput(){
        return $this->_setupInput;
    }
    /**
     * get the setup source
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getSetupSource(){
        return $this->_setupSource;
    }
    /**
     * check if attribute is visible
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getVisible(){
        return true;
    }
    /**
     * check if source needs to be generated
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getGenerateSource(){
        return false;
    }
    /**
     * get additional setup values
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getAdditionalSetup(){
        return '';
    }

    /**
     * check if attribute is required
     * @access public
     * @return mixed
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getRequired(){
        return $this->getAttribute()->getData('required');
    }

    /**
     * check if attribute is yes/no
     * @access public
     * @return bool
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getIsYesNo() {
        return false;
    }

    /**
     * can use editor
     * @access public
     * @return bool
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getEditor() {
        return false;
    }
    /**
     * get attribute options for source model
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getAttributeOptions(){
        return $this->getPadding(2).'return array();';
    }
    /**
     * get admin from options
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getFormOptions(){
        $options = '';
        $padding = $this->getPadding(3);
        $eol     = $this->getEol();
        $note = $this->getAttribute()->getNote();
        if ($note){
            $options .= $padding."'note'	=> $"."this->__('".$note."'),".$eol;
        }
        if ($this->getRequired()){
            $options .= $padding."'required'  => true,".$eol;
            $options .= $padding."'class' => 'required-entry',".$eol;
        }
        return $options.$eol;
    }

    /**
     * getter for attribute type
     * @return string
     * @access public
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getType(){
        return $this->_type;
    }
    /**
     * getter xml node for attribute
     * @return string
     * @access public
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getTypeConfigPath() {
        return Ultimate_ModuleCreator_Helper_Data::ATTRIBUTE_TYPES_PATH.'/'.$this->getType();
    }
    /**
     * getter config for attribute
     * @access public
     * @param $path
     * @return mixed
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getConfig($path = null) {
        if (!is_null($path)){
            $path = $this->getTypeConfigPath().'/'.$path;
        }
        else {
            $path = $this->getTypeConfigPath();
        }
        return Mage::helper('modulecreator')->getConfig()->getNode($path);
    }
    /**
     * check if attribute can behave as name
     * @access public
     * @return bool
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getIsAllowedAsName() {
        return (bool)(string)$this->getConfig('allow_is_name');
    }
    /**
     * check if attribute can be in mass update
     * @access public
     * @return mixed
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getMassUpdate() {
        return (bool)(string)$this->getConfig('mass_update');
    }
    /**
     * get values for mass action
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getMassActionValues() {
        return '';
    }
}
