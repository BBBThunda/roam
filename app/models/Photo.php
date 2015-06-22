<?php

class Photo extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
        protected $table = 'user_photo';

        protected $fillable = array('user_id', 'file');

        // User relationship
        public function user() {
            return $this->belongsTo('User', 'user_id')->first();
        }


        // Get directory where file is stored
        public function getDirectory() {
            return public_path() . Config::get('constants.USER_IMG_DIR') . '/';
        }

        // Get filename only
        public function getFilename() {
            return $this->id . '.' . $this->extension;
        }

        // Get filepath (dir + filename)
        public function getFilepath() {
            return $this->getDirectory() . $this->getFilename();
        }

        // Get file URL
        public function getUrl() {
            return Config::get('constants.USER_IMG_DIR') . '/' . $this->getFilename();
        }
}
