<?php
namespace packages\userpanel\processes;
use packages\userpanel\{Log as userLog, User};
use packages\base\{Process, response, Log};

class FixUserRegisteredAt extends Process {
	public function run(): response {
		Log::setLevel("debug");
		$log = Log::getInstance();
		$log->info("get register logs");
		$logs = new userLog();
		$logs->where("type", "packages\\userpanel\\logs\\register");
		$logs = $logs->get();
		$log->reply(count($logs), " logs found");

		foreach ($logs as $item) {
			$parameters = $item->parameters;
			$user = null;
			if (isset($parameters["inputs"]["email"])) {
				$log->info("try to find user by email: '{$parameters["inputs"]["email"]}'");
				$user = (new User)->where("email", $parameters["inputs"]["email"])->getOne();
				if ($user) {
					$log->reply("found, #", $user->id);
				} else {
					$log->reply("notfound");
				}
			}
			if (!$user and isset($parameters["inputs"]["cellphone"])) {
				$log->info("try to find user by cellphone: '{$parameters["inputs"]["cellphone"]}'");
				$user = (new User)->where("cellphone", $parameters["inputs"]["cellphone"])->getOne();
				if ($user) {
					$log->reply("found, #", $user->id);
				} else {
					$log->reply("notfound");
				}
			}
			if (!$user) {
				$log->info("skip this user in Log: #", $item->id);
				continue;
			}
			$user->registered_at = $item->time;
			$user->save();
		}
		return new response(true);
	}
}
