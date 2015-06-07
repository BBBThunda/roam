<?php

class Tours extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
        protected $table = 'tours';

        protected $fillable = array('name', 'description'
            , 'tour_type_id');

}
