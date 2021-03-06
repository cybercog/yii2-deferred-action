<?php
namespace infinite\deferred\components;

class Result extends \yii\base\Component
{
	public $action;
	public $isSuccess = true;
	public $message;

	public function __sleep()
    {
        $keys = array_keys((array) $this);
        $bad = ["action"];
        foreach ($keys as $k => $key) {
            if (in_array($key, $bad)) {
                unset($keys[$k]);
            }
        }
        return $keys;
    }

	public function package()
	{
		$package = [];
		$package['isSuccess'] = $this->isSuccess;
		$package['message'] = $this->message;
		return $package;
	}

	public function clear()
	{
		return true;
	}
}
?>