<?
class Model_Organization extends ORM {
			



        // Relations
        protected $_has_many    = array (
                                                'users' => array('model' => 'user', 'through' => 'organizations_users'),
                                        );

        // Rules
        //protected $_rules = array(
        //);



		
		public function get_by_field($field,$value)
		{
			$object = $this->where($field,'=',$value)->find();
		}
		

}
