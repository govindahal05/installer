<?php

namespace Helpers;

class PermissionsChecker
{
    /**
     * @var array
     */
    protected $results = [];

    /**
     * Set the result array permissions and errors.
     *
     * @return mixed
     */
    public function __construct()
    {
        $this->results['permissions'] = [];

        $this->results['errors'] = null;
    }

    /**
     * Check for the folders permissions.
     *
     * @param array $folders
     * @return array
     */
    public function check(array $folders)
    {
        // dd($folders);
        foreach ($folders as $folder => $permission) {
            // dd($permission);
            foreach ($permission as $perm => $value) {
                // dd($value);

                if (!($this->getPermission($perm) >= $value)) {
                    $this->addFileAndSetErrors($perm, $value, false);
                } else {
                    $this->addFile($perm, $value, true);
                }
            }
            return $this->results;
        }
        // dd($this->results);

    }

    /**
     * Get a folder permission.
     *
     * @param $folder
     * @return string
     */
    private function getPermission($folder)
    {
        dd(base_path());
        return substr(sprintf('%o', fileperms(base_path($folder))), -4);
    }

    /**
     * Add the file to the list of results.
     *
     * @param $folder
     * @param $permission
     * @param $isSet
     */
    private function addFile($folder, $permission, $isSet)
    {
        array_push($this->results['permissions'], [
            'folder' => $folder,
            'permission' => $permission,
            'isSet' => $isSet,
        ]);
    }

    /**
     * Add the file and set the errors.
     *
     * @param $folder
     * @param $permission
     * @param $isSet
     */
    private function addFileAndSetErrors($folder, $permission, $isSet)
    {
        $this->addFile($folder, $permission, $isSet);

        $this->results['errors'] = true;
    }
}
