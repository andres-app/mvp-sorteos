<?php
session_destroy();
header("Location: {$base}/login");
exit;
