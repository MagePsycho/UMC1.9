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
 * image attribute type
 *
 * @category    Ultimate
 * @package     Ultimate_ModuleCreator
 * @author      Marius Strajeru <ultimate.module.creator@gmail.com>
 */
class Ultimate_ModuleCreator_Model_Attribute_Type_Image
    extends Ultimate_ModuleCreator_Model_Attribute_Type_Abstract {
    /**
     * type code
     * @var string
     */
    protected $_type       = 'image';
    /**
     * eav setup input
     * @var string
     */
    protected $_setupInput = 'image';
    /**
     * don't show in admin grid
     * @access public
     * @return bool
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getAdminGrid() {
        return false;
    }
    /**
     * check if attribute is required
     * @access public
     * @return mixed
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getRequired(){
        return false;
    }
    /**
     * get the type for the form
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getFormType() {
        return 'image';
    }
    /**
     * get text for rss
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getRssText() {
        $eol        = $this->getEol();
        $content    = '';
        $entityName = strtolower($this->getAttribute()->getEntity()->getNameSingular());
        $ucEntity   = ucfirst($entityName);
        $module     = strtolower($this->getAttribute()->getEntity()->getModule()->getModuleName());
        $content   .= $this->getPadding(3).'if ($item->get'.$this->getAttribute()->getMagicMethodCode().'()) {'.$eol;
        $content   .= $this->getPadding(4).'$description .= \'<div>\';'.$eol;
        $content   .= $this->getPadding(4).'$description .= Mage::helper(\''.$module.'\')->__(\''.$this->getAttribute()->getLabel().'\');'.$eol;
        $content   .= $this->getPadding(4).'$description .= \'<img src="\'.Mage::helper(\''.$module.'/'.$entityName.'_image\')->init($item, \''.$this->getAttribute()->getCode().'\')->resize(75).\'" alt="\'.$this->htmlEscape($item->get'.$this->getAttribute()->getEntity()->getNameAttributeMagicCode().'()).\'" />\';'.$eol;
        $content   .= $this->getPadding(4).'$description .= \'</div>\';'.$eol;
        $content   .= $this->getPadding(3).'}'.$eol;
        return $content;
    }
    /**
     * get the html for frontend
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getFrontendHtml() {
        $eol        = $this->getEol();
        $content    = '';
        $entityName = strtolower($this->getAttribute()->getEntity()->getNameSingular());
        $ucEntity   = ucfirst($entityName);
        $module     = strtolower($this->getAttribute()->getEntity()->getModule()->getModuleName());
        $content   .= '<?php if ($_'.$entityName.'->get'.$this->getAttribute()->getMagicMethodCode().'()) :?>'.$eol;
        $content   .= $this->getHelper()->getPadding().'<img src="<?php echo Mage::helper(\''.$module.'/'.$entityName.'_image\')->init($_'.$entityName.', \''.$this->getAttribute()->getCode().'\')->resize(75);?>" alt="<?php echo $this->htmlEscape($_'.$entityName.'->get'.$this->getAttribute()->getEntity()->getNameAttributeMagicCode().'());?>" />'.$eol;
        $content   .= '<?php endif;?>'.$eol;
        return $content;
    }
    /**
     * get the setup backend type
     * @access public
     * @return string
     * @author Marius Strajeru <ultimate.module.creator@gmail.com>
     */
    public function getSetupBackend(){
        $attribute  = $this->getAttribute();
        $entity     = $attribute->getEntity();
        $module     = $entity->getModule();
        return $module->getLowerModuleName().'/'.strtolower($entity->getNameSingular()).'_attribute_backend_image';
    }
}
