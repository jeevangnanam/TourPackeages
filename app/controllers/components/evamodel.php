<?php

class EvamodelComponent extends Object{


    /**
     * The class name of the meta model
     *
     * @var string
     */
    protected $_metaModel = null;
    
    

    /**
     * A value that uniquely identifies an entity (e.g. user_id, product_id etc)
     *
     * @var int
     */
    protected $_entityId = null;


    /**
     * The name of entity id column.
     *
     * @var string
     */
    protected $_entityIdColumn = '';

     
    function one(){

        echo 'hi';
    }

    public function setEntityId($id)
    {
        $this->_entityId = $id;
    }

    /**
     * Retrieves a value for a specified attribute
     *
     * @param int $id
     * @param string $attributeName
     * @return string
     */
    public function getAttributeValue( $attributeName)
    {
        if( is_null($attributeName) ) throw new Exception ("Attr is not set");
        
        //$this->setEntityId($id);
        $this->ConfigMeta = ClassRegistry::init('package_meta');

		

        $entity = $this->ConfigMeta->find(array('name' => $attributeName));
		
        return (!is_null($entity)) ? $entity['package_meta']['value'] : '';

    }


    /**
     * Saves a single attribute value by attribute name
     *
     * @param int $id
     * @param string $attributeName
     * @param string $attributeValue
     * @return mixed
     */
    public function setAttributeValue( $attributeName, $attributeValue)
    {
       
    $this->ConfigMeta = ClassRegistry::init('package_meta');
       //$entity = $configMeta->fetchRow($this->_entityIdColumn.'='.$id." AND UPPER(meta_name) = '".strtoupper($attributeName)."'");


        $entity = $this->ConfigMeta->find(array('name' => $attributeName));
        
       $data = array(
         
         'name'            => strtoupper($attributeName),
         'value'           => $attributeValue
       );

       if(!$entity ) //save new attribute
           return $this->ConfigMeta->save($data);
       else //update existing
            $this->ConfigMeta->id =$entity['package_meta']['id'];

           return $this->ConfigMeta->save($data);

    }

    /**
     * Magical __get - make sure you call setEntityId() before making magic calls
     *
     * @param string $name
     * @return string
     */
    public function __get($name)
    {
   
        return $this->getAttributeValue($name);
    }

    /**
     * Magical __set - make sure you call setEntityId() before making magic calls
     *
     * @param string $name
     * @param string $value
     * @return null
     */
    public function __set($name, $value)
    {
        if( $name == 'data')return $this->ConfigMeta;
       if( $name == 'enabled')return ;
        if( $name == 'ConfigMeta')return  $this->ConfigMeta;


        $this->setAttributeValue($name, $value);
    }

}

?>