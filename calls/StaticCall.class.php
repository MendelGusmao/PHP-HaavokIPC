<?php

    /**
     * Part of PHP-Ghetto-IPC, a library to execute PHP code between different
     * PHP versions, usually from PHP 4 (called frontend) to 5 (called backend).
     *
     * Call is an object responsible for storing the information of a call,
     * the class method or function that will be called in backend, the objects
     * it will use and the invoking of itself and its callback (if any)
     *
     * When reading $callee, think in "class method" OR "function"
     *
     * @author Mendel Gusmao <mendelsongusmao () gmail.com> | @MendelGusmao
     * @copyright Mendel Gusmao
     * @version 1.3
     *
     */

    class StaticCall extends Call {
        
        var $is_static = true;

        function __construct ($callee, $parameters = void, $callback = void, $additional_callback_parameters = void) {

            $this->Call($callee, $parameters, $callback, $additional_callback_parameters);
            
        }

        function StaticCall ($callee, $parameters = void, $callback = void, $additional_callback_parameters = void) {

            $this->parameters = $parameters;
            $this->callback = $callback;            
            $this->additional_callback_parameters = $additional_callback_parameters;

            if (is_array($callee)) {
                
                if (2 == count($callee)) {
                    $this->class = $callee[0];
                    $scope = $this->_parse_static_method($callee[1]);
                    $this->method = $scope["method"];
                }
                else if (1 == count($callee)) {
                    
                    $scope = $this->_parse_static_method($callee[0]);

                    if ($scope !== false) {
                        list($this->class, $this->method) = $scope;
                    }
                    
                }
                else {
                    trigger_error(gipc_error_message(__CLASS__, __FUNCTION__, 
                        "Wrong parameter count for callee."), E_USER_ERROR);                
                }

            }
            else {
                
                $scope = $this->_parse_static_method($callee);

                if ($scope !== false) {
                    list($this->class, $this->method) = $scope;
                }
                
            }

            if (!$this->class) {
                trigger_error(gipc_error_message(__CLASS__, __FUNCTION__, 
                    "No class specified for method '{$this->method}'"), E_USER_ERROR);                        
            }
            
            if ("&" == substr($this->class, 0, 1)) {
                trigger_error(gipc_error_message(__CLASS__, __FUNCTION__, 
                    "Can't allow instance reusing when calling a static method."), E_USER_ERROR);
            }
            
        }
        
        function invoke (&$instances, &$wrappers) {

            $parameters = gipc_to_array($this->parameters);
            
            if (class_exists($this->class)) {

                if (method_exists($this->class, $this->method)) {
                    $this->return = call_user_func_array(
                        array($this->class, $this->method),
                        $parameters
                    );
                }
                else {
                    $this->return = void;
                    trigger_error(gipc_error_message(__CLASS__, __FUNCTION__,
                        "Static method '{$this->method}' not found in class '{$this->class}'."), E_USER_ERROR);
                }

            }
            else {
                $this->return = void;
                trigger_error(gipc_error_message(__CLASS__, __FUNCTION__,
                    "Class '{$this->class}' doesn't exist."), E_USER_ERROR);
            }

            $this->_filter_resource_return();

        }

        function _parse_static_method ($callee) {
            
            $class = "";
            $method = "";
            
            $sro = strpos($callee, "::");
            
            if ($sro !== false) {
                $class = substr($callee, 0, $sro);
                $method = substr($callee, $sro + 2);
                
                return array(
                    "class" => $class, 
                    "method" => $method
                );
            }
            
            return false;
            
        }

    }

?>