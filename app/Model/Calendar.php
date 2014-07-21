<?php
class Calendar extends AppModel {

	 public function upcomingWeeks($weeks) {

        $fullResult = array();

        $todayWeekDay = date("N");
        $startDate = date('Y-m-d');
        if (($todayWeekDay == 6) or ($todayWeekDay == 7)) {
            $startDate = date('Y-m-d', strtotime($startDate .'+1 week'));
        }

        for($weekOffset=0; $weekOffset <= $weeks; $weekOffset++) {

            $weekArray = array();

            $thisCalWeek = date('W', strtotime($startDate . '+'.$weekOffset.' week'));
            $thisCalYear = date('Y', strtotime($startDate . '+'.$weekOffset.' week'));

            for($day=1; $day<=5; $day++){

                $today = 0;
                $theMonth = date('M', strtotime($thisCalYear."W".$thisCalWeek.$day));
                $theDayNumber = date('j', strtotime($thisCalYear."W".$thisCalWeek.$day));
                $sqlDate = date('Y-m-d', strtotime($thisCalYear."W".$thisCalWeek.$day));
                $toDate = date('Y-m-d');

                if ($sqlDate == $toDate) {
                    $today = 1;
                }

                $Days = ClassRegistry::init('Days');
                $dateDetails = $Days->findByDate($sqlDate);
                if ($dateDetails) {

                    if (($dateDetails['Days']['ab'] == 'A') or ($dateDetails['Days']['ab'] == 'B')) {

                        $periodsKeys = array();
                        $periodsValues = array();
                        $todayPeriods = array();
                        $periodsIncomplete = array();

                        $Periods = ClassRegistry::init('Periods');
                        $Courses = ClassRegistry::init('Courses');
                        $dayPeriods = $Periods->findAllByAbAndActive($dateDetails['Days']['ab'], 1, array(), array('Periods.block' => 'desc'));

                        foreach ($dayPeriods as $dayPeriods) {


                            $periodCourse = $Courses->findById($dayPeriods['Periods']['course_id']);
                                
                            $todayPeriods[$dayPeriods['Periods']['block']]['name'] = $periodCourse['Courses']['name'];
                            $todayPeriods[$dayPeriods['Periods']['block']]['id'] = $dayPeriods['Periods']['id'];

                            $Assignments = ClassRegistry::init('Assignments');
                            $Homeworks = ClassRegistry::init('Homeworks');

                            $assignmentsPresent = $Assignments->findByDayIdAndPeriodId($dateDetails['Days']['id'], $dayPeriods['Periods']['id']);
                            $homeworksPresent = $Homeworks->findByDayIdAndPeriodId($dateDetails['Days']['id'], $dayPeriods['Periods']['id']);
                            
                            if ($assignmentsPresent and $homeworksPresent) {
                                $periodsIncomplete[$dayPeriods['Periods']['block']] = 1;
                            } else {
                                $periodsIncomplete[$dayPeriods['Periods']['block']] = 0;
                            }


                        }



                        if ($dateDetails['Days']['halfday'] == 1) {

                            array_push($weekArray, array('halfday' => 1,
                                                            'abday' => $dateDetails['Days']['ab'],
                                                            'month' => $theMonth,
                                                            'daynumber' => $theDayNumber,
                                                            'today' => $today,
                                                            'classes' => $todayPeriods,
                                                            'classesincomplete' => $periodsIncomplete,
                                                            'sqldate' => $sqlDate,
                                                            'dayId' => $dateDetails['Days']['id']
                                                        )
                            );

                        } else {

                            array_push($weekArray, array('abday' => $dateDetails['Days']['ab'],
                                                            'month' => $theMonth,
                                                            'daynumber' => $theDayNumber,
                                                            'today' => $today,
                                                            'classes' => $todayPeriods,
                                                            'classesincomplete' => $periodsIncomplete,
                                                            'sqldate' => $sqlDate,
                                                            'dayId' => $dateDetails['Days']['id']
                                                        )
                            );

                        }

                    } else {

                        if ($dateDetails['Days']['noschool'] == 1) {

                            array_push($weekArray, array('noschool' => 1,
                                                            'month' => $theMonth,
                                                            'daynumber' => $theDayNumber,
                                                            'today' => $today,
                                                            'sqldate' => $sqlDate,
                                                            'dayId' => $dateDetails['Days']['id']
                                                        )
                            );

                        } else {

                            if ($dateDetails['Days']['ab'] == 'M') {

                                array_push($weekArray, array('abday' => 'M',
                                                            'month' => $theMonth,
                                                            'daynumber' => $theDayNumber,
                                                            'today' => $today,
                                                            'sqldate' => $sqlDate,
                                                            'dayId' => $dateDetails['Days']['id']
                                                         )
                                );

                            } elseif ($dateDetails['Days']['ab'] == 'F') {

                                array_push($weekArray, array('abday' => 'F',
                                                            'month' => $theMonth,
                                                            'daynumber' => $theDayNumber,
                                                            'today' => $today,
                                                            'sqldate' => $sqlDate,
                                                            'dayId' => $dateDetails['Days']['id']
                                                         )
                                );
                                } else {

                                array_push($weekArray, array('error' => 1,
                                                            'month' => $theMonth,
                                                            'daynumber' => $theDayNumber,
                                                            'today' => $today,
                                                            'sqldate' => $sqlDate
                                                        )
                                );
                            }

                        }

                    }

                } else {

                    array_push($weekArray, array('incomplete' => 1,
                                                    'month' => $theMonth,
                                                    'daynumber' => $theDayNumber,
                                                    'today' => $today,
                                                    'sqldate' => $sqlDate
                                                )
                    );

                }

            }

            array_push($fullResult, array('week' => $weekArray));
        }

        return $fullResult;

     }

     public function weekCal($id, $offset) {

	 	App::uses('CakeTime', 'Utility');

	 	$fullResult = array();
        if (!$offset) {
            $offset = 0;
        }

	 	$currdayofweek = date("N");
        if (($currdayofweek == 6) or ($currdayofweek == 7)) {
            $offset = $offset + 1;
        }
        if ($offset == 0) {
     	  $week_number = date("W");
            $year = date("Y");
        } else {
            $todayDate = date('Y-m-d');
            $week_number = date("W", strtotime($todayDate .' +'.$offset.' week'));
            $year = date("Y", strtotime($todayDate .' +'.$offset.' week'));
        }

		for($day=1; $day<=5; $day++)
            {
            	$today = 0;
                $theweekday = date('D', strtotime($year."W".$week_number.$day));
                $themonth = date('M', strtotime($year."W".$week_number.$day));
                $thedaynum = date('j', strtotime($year."W".$week_number.$day));

                $sqlDate = date('Y-m-d', strtotime($year."W".$week_number.$day));

                $todayDate = date('Y-m-d');

                if ($todayDate == $sqlDate) {
                    $today = 1;
                } else {
                	$today = 0;
                }

                $Days = ClassRegistry::init('Days');

                $dateDetails = $Days->findByDate($sqlDate);

                if ($dateDetails) {

                	if ($dateDetails['Days']['noschool'] == 0) {

                		$Periods = ClassRegistry::init('Periods');

                		$periodDetails = $Periods->findById($id);

                		if ($periodDetails['Periods']['ab'] == $dateDetails['Days']['ab']) {

                			$dayAssignments = array();

                			$Assignments = ClassRegistry::init('Assignments');

                			$dayAssign = $Assignments->findAllByDayId($dateDetails['Days']['id']);

                			foreach ($dayAssign as $dayAssign) {
                				if (($dayAssign['Assignments']['period_id'] == $id) & ($dayAssign['Assignments']['cancel'] != 1)) {

                					array_push($dayAssignments, array('color' => $dayAssign['Assignments']['color'],
                													'bold' => $dayAssign['Assignments']['bold'],
                													'text' => $dayAssign['Assignments']['text']
                												)
                					);

                				}
                			}

                			$dayHomeworks = array();

                			$Homeworks = ClassRegistry::init('Homeworks');

                			$dayHomework = $Homeworks->findAllByDayId($dateDetails['Days']['id']);

                			foreach ($dayHomework as $dayHomework) {
                				if (($dayHomework['Homeworks']['period_id'] == $id) & ($dayHomework['Homeworks']['cancel'] != 1)) {

                					array_push($dayHomeworks, array('color' => $dayHomework['Homeworks']['color'],
                													'bold' => $dayHomework['Homeworks']['bold'],
                													'text' => $dayHomework['Homeworks']['text']
                												)
                					);

                				}
                			}

                			if ($dateDetails['Days']['halfday'] == 1) {

                				array_push($fullResult, array('weekDay' => $theweekday,
                												'month' => $themonth,
                												'dayNumber' => $thedaynum,
                												'abday' => $dateDetails['Days']['ab'],
                												'today' => $today,
                												'halfDay' => 1,
                												'assignments' => $dayAssignments,
                												'homework' => $dayHomeworks
                											)
                				);

                			} else {

                				array_push($fullResult, array('weekDay' => $theweekday,
                											'month' => $themonth,
                											'dayNumber' => $thedaynum,
                											'abday' => $dateDetails['Days']['ab'],
                											'today' => $today,
                											'assignments' => $dayAssignments,
                											'homework' => $dayHomeworks
                										)
                				);
                			}

                		} else {

                			if ($dateDetails['Days']['halfday'] == 1) {

                				array_push($fullResult, array('weekDay' => $theweekday,
                												'month' => $themonth,
                												'dayNumber' => $thedaynum,
                												'abday' => $dateDetails['Days']['ab'],
                												'noClass' => 1,
                												'today' => $today,
                												'halfDay' => 1
                											)
                				);

                			} else {

                				array_push($fullResult, array('weekDay' => $theweekday,
                											'month' => $themonth,
                											'dayNumber' => $thedaynum,
                											'abday' => $dateDetails['Days']['ab'],
                											'noClass' => 1,
                											'today' => $today
                										)
                				);
                			}

                		}

                	} else {

                		array_push($fullResult, array('weekDay' => $theweekday,
                								'month' => $themonth,
                								'dayNumber' => $thedaynum,
                								'noSchool' => 1,
                								'today' => $today
                							)
                		);


                	}

            	} else {
            		array_push($fullResult, array('weekDay' => $theweekday,
                								'month' => $themonth,
                								'dayNumber' => $thedaynum,
                								'notSet' => 1,
                								'today' => $today
                							)
                	);
            	}
            }

		return $fullResult;
	}

      public function periodCal($id, $offset) {

        App::uses('CakeTime', 'Utility');

        $fullResult = array();
        if (!$offset) {
            $offset = 0;
        }

        $Periods = ClassRegistry::init('Periods');
        $periodDetails = $Periods->findById($id);
        $year = $periodDetails['Periods']['year'];

        if ($offset <= 3) {
            $theMonth = $offset + 9;
            $theYear = $year;
        } else {
            $theMonth = $offset - 3;
            $theYear = $year + 1;
        }

        $theMonth = sprintf('%02s', $theMonth);

        $dateBeginning = $theYear . '-' . $theMonth;

        $dayConditions = array('Days.date LIKE' => $dateBeginning . '%', 'Days.ab' => $periodDetails['Periods']['ab']);
        $Days = ClassRegistry::init('Days');
        $theDates = $Days->find('all', array(
            'conditions' => $dayConditions,
            'order' => 'Days.date ASC',
            'fields' => array('Days.date', 'Days.id', 'Days.halfday')
            )
        );

        $datesInfo = array();

        foreach ($theDates as $theDates) {

            $assConditions = array('Assignments.day_id' => $theDates['Days']['id'], 'Assignments.period_id' => $id);
            $hwConditions = array('Homeworks.day_id' => $theDates['Days']['id'], 'Homeworks.period_id' => $id);

            $Assignments = ClassRegistry::init('Assignments');
            $dayAssign = $Assignments->find('all', array(
                'conditions' => $assConditions,
                'fields' => array('Assignments.text', 'Assignments.bold', 'Assignments.color'),
                'order' => 'Assignments.id ASC'
                )
            );

            $Homeworks = ClassRegistry::init('Homeworks');
            $dayHomework = $Homeworks->find('all', array(
                'conditions' => $hwConditions,
                'fields' => array('Homeworks.text', 'Homeworks.bold', 'Homeworks.color'),
                'order' => 'Homeworks.id ASC'
                )
            );

            $theweekday = date('l', strtotime($theDates['Days']['date']));
            $thedaynumber = date('j', strtotime($theDates['Days']['date']));

            array_push($datesInfo, array('daynumber' => $thedaynumber,
                                        'weekday' => $theweekday,
                                        'halfday' => $theDates['Days']['halfday'],
                                        'assignments' => $dayAssign,
                                        'homework' => $dayHomework)
            );

        }

        $dateObj   = DateTime::createFromFormat('!m', $theMonth);
        $monthName = $dateObj->format('F');

        array_push($fullResult, array('year' => $theYear,
                                    'month' => $monthName,
                                    'dates' => $datesInfo
                                    )
        );

        return $fullResult;
    }
}