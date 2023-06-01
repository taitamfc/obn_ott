<?php
namespace Manager;

 

    class EmployeeManager {
        private static $employees = array();

        public static function addEmployee(Employee $employee) {
            self::$employees[] = $employee;
        }

        public static function removeEmployee($employeeIndex) {
            unset(self::$employees[$employeeIndex]);
            self::$employees = array_values(self::$employees);
        }

        public static function getEmployee($employeeIndex) {
            return self::$employees[$employeeIndex];
        }

        public static function getAllEmployees() {
            return self::$employees;
        }
    }


    ?>