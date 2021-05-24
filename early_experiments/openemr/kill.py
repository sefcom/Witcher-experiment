#!/usr/bin/env python3
import sys
import os
import signal


def write_stdout(s):
   sys.stdout.write(s)
   sys.stdout.flush()


def write_stderr(s):
   sys.stderr.write(s)
   sys.stderr.flush()


def main():
   while 1:
       write_stdout('READY\n')
       line = sys.stdin.readline()
       write_stdout('This line kills supervisor: ' + line)
       try:
               pid = 1
               os.kill(pid, signal.SIGQUIT)
       except Exception as e:
               write_stdout('Could not kill supervisor: ' + e + '\n')
       write_stdout('RESULT 2\nOK')


if __name__ == '__main__':
   main()

