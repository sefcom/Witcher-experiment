Command line used to find this crash:

/afl/afl-fuzz -i /p/Witcher/java/tests/WebGoat/WICHR/work/initial_seeds -o /p/Witcher/java/tests/WebGoat/WICHR/work -m 8G -M fuzzer-master -x /p/Witcher/java/tests/WebGoat/WICHR/work/dict.txt -t 5000+ -- /httpreqr --url http://172.17.0.2:18080/WebGoat/SqlInjection/attack2

If you can't reproduce a bug outside of afl-fuzz, be sure to set the same
memory limit. The limit used for this fuzzing session was 8.00 GB.

Need a tool to minimize test cases before investigating the crashes or sending
them to a vendor? Check out the afl-tmin that comes with the fuzzer!

Found any cool bugs in open-source tools using afl-fuzz? If yes, please drop
me a mail at <lcamtuf@coredump.cx> once the issues are fixed - I'd love to
add your finds to the gallery at:

  http://lcamtuf.coredump.cx/afl/

Thanks :-)
