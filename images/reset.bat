REM Delete eval folder with licence key and options.xml which contains a reference to it
for %%I in ("PhpStorm2019.2","WebStorm", "IntelliJ", "CLion", "Rider", "GoLand") do (
    for /d %%a in ("%USERPROFILE%\.%%I*") do (
        rd /s /q "%%a/config/eval"
        del /q "%%a\config\options\other.xml"
    )
)

REM Delete registry key and jetbrains folder (not sure if needet but however)
rmdir \s \q "%USERPROFILE%\AppData\Roaming\JetBrains"
C:\Windows\System32\reg.exe delete "HKEY_CURRENT_USER\Software\JavaSoft" /f