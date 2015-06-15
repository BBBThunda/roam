<?php

class Tour extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
        protected $table = 'tours';

        protected $fillable = array('name', 'description'
            , 'tour_type_id', 'tour_guide_id', 'is_guide', 'attendee_id');

        // Tour guide relationship
        public function guide() {
            return $this->hasOne('User', 'id', 'tour_guide_id');
        }

        // Attendee relationship
        public function attendee() {
            return $this->hasOne('attendee_id');
        }

}
