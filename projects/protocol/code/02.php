<?php
    $root_directory = "../../../";
    require($root_directory."code_header.php");
?>
Q = {L -/-, H -/-, 0 n/m, 1 x/y} where n,m,x, y are Integers
Σ = {L, H}
ι(x) = x
ω(0 n/m) = ω(1 n/m) = n/m
δ = {
    (H -/-,H -/-) -> (2/2, 2/2),
    (L -/-, H -/-) -> (1/2, 1/2),
    (H -/-, L -/-) -> (1/2, 1/2),
    (L -/-, L -/-) -> (0/2, 0/2),
    (0 n/m, 0 x/y) -> (0 (n+x)/(m+y), (1 (n+x)/(m+y)),
    (0 n/m, 1 x/y) -> (0 n/m, 1 n/m)
    }
<?php
    require($root_directory."code_footer.html");
?>
