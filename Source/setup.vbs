Set oShell = CreateObject ("Wscript.Shell") 
Dim strArgs
strArgs = "cmd /c runprogram.bat"

oShell.Run strArgs, 0, false
