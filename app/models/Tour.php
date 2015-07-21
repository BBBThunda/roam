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
            return $this->hasOne('User', 'id', 'attendee_id');
        }

        /**
         * Can $user check out this tour?
         *
         * @param $user Id of user to be verified
         * @return bool
         */
        public function canCheckOut($userId) {

            // Can't check out if it's already checked out
            if (!empty($this->attendee->id)) {
                return false;
            }

            // Can't check out your own tour
            if (!empty($this->guide->id) && ($this->guide->id === $userId)) {
                return false;
            }

            return true;

        }

        /**
         * Can $user claim this tour request?
         *
         * @param $user Id of user to be verified
         * @return bool
         */
        public function canClaim($userId) {

            // Can't claim if you're not a guide
            if (User::find($userId)->is_guide === false) {
                return false;
            }

            // Can't claim if it's already claimed
            if (!empty($this->guide->id)) {
                return false;
            }

            // Can't claim your own tour request
            if (!empty($this->attendee) && $this->attendee->id ===$userId) {
                return false;
            }

            return true;
        }

        /**
         * Become the attendee for this tour
         */
        public function checkOut() {
            $this->attendee = Auth::id();
        }

        /**
         * Become the guide for this tour request
         */
        public function claim() {
            $this->guide = Auth::id();
        }
}
