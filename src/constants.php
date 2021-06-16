<?php
const FUNC_INSTALL            = 0x0000800;
const FUNC_BASIC              = 0x0001000;
const FUNC_STACK_TRACE        = 0x0002000; // affects stack traces
const FUNC_STEP_DEBUG         = 0x0004000; // affects step debugging
const FUNC_FUNCTION_TRACE     = 0x0008000; // affects function traces
const FUNC_VAR_DUMP           = 0x0010000; // affects overloaded var_dump function
const FUNC_PROFILER           = 0x0020000; // affects overloaded var_dump function
const FUNC_CODE_COVERAGE      = 0x0040000;
const FUNC_GARBAGE_COLLECTION = 0x0080000;

const FUNC_ALL                = 0x007ffff;

const TYPE_YOUTUBE            = 1;
?>
