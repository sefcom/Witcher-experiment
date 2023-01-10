
#Witcher Experiments

## Interpreted Experiments

All of the scripts are run from the Witcher-experiments area directory (e.g., Witcher-exeperiments/interpreter-targets).

Pull the app container and run the fuzzer

`../scripts/run-single-experiment.sh openemr/witcher-user --pull`

`../scripts/run-single-experiment.sh openemr/witcher-user `

The experiments use different directories for the configuration files (witcher_config.json) and results that use a particular user role.
For example, the evaluation above uses the user role in OpenEMR.


# Burp Scan
To run a burp scan, start the container
`../scripts/run-single-experiment.sh ${app}/witcher-user --build --burp`

The follwing items are added when creating a new Burp scan of a website
- New Scan
- Scan Details: add login to url's to scan from `witcher_config.json`
- Scan Configuration: select crawling configuration most complete and auditing configuration maximum
- Application login: add login from `witcher_config.json`

# Burpplus Scan
To run a burp scan, start the container
`../scripts/run-single-experiment.sh ${app}/witcher-user --build --burpplus 8080`

Start Burp, start Burp's proxy on the same port used in the command above (port 8080) and then disable Burp's proxy intercept.

Use Burp's scanning feature the same as described above.

# Running the reports
After the scans are completed, the results can be calculated by running diff_coverage.py
```bash
# run report on results between witcher and webfuzz
../scripts/diff_coverage.py ${app}/wfinst-user ${app}/webfuzzcov-user --force_match
# run report on results between witcher and webfuzz with burpplus
../scripts/diff_coverage.py ${app}/wfinst-user ${app}/webfuzzcov-user --witcher ${app}/wfinst-burpplus --force_match
```









