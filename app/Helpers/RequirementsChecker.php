<?php

namespace Helpers;

class RequirementsChecker
{

    /**
     * Check for the server requirements.
     *
     * @param array $requirements
     * @return array
     */
    public function check(array $requirements)
    {
        $results = [];
        // dd($requirements);
        foreach ($requirements as $requirement) {
            // dd($requirement);
            foreach ($requirement as $re) {
                // echo ($re);
                $results['requirement'][$re] = true;

                if (!extension_loaded($re)) {
                    $results['requirement'][$re] = false;

                    $results['errors'] = true;
                }

            }
            return $results;
        }
        // dd($results);

    }
}
