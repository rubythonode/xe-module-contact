<?php
    /**
     * @class  contactModel
     * @author NHN (developers@xpressengine.com)
     * @brief  contact module Model class
     **/

    class contactModel extends module {

		/**
		 * @brief initialization
		 **/
		function init() {
		}


        function getFormCompsHTML($module_srl) {
			$oDocumentAdminModel = &getModel('document');
            $extra_keys = $oDocumentAdminModel->getExtraKeys($module_srl);
            Context::set('extra_keys', $extra_keys);

            $oTemplate = &TemplateHandler::getInstance();
            return $oTemplate->compile($this->module_path.'tpl', 'extra_keys');
        }

		/**
         * @brief return get editor
         **/
        function getEditor($module_srl) {

            if(!$module_srl) $module_srl = Context::get('module_srl');

            $oEditorModel = &getModel('editor');

            return $oEditorModel->getModuleEditor('document', $module_srl, $module_srl, 'module_srl', 'term');
        }

		function getFormCompsCount($module_srl) {
			$oDocumentAdminModel = &getModel('document');
            $extra_keys = $oDocumentAdminModel->getExtraKeys($module_srl);

            return count($extra_keys);
        }

    }
?>
