<?php

for ($i = 0, $j = 50; $i < 100; $i++) {
    while ($j--) {
        if ($j == 17) goto end;
    }
}
echo "i = $i"; // 跳过
end:
echo 'j hit 17'; // j hit 17
