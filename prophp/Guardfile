guard 'phpunit', :cli => '--colors', :tests_path => 'test', :clear => true, :keep_failed => true, :all_after_pass => true do
  watch(%r{^.+Test\.php$})
  watch(%r{^src/classes/(.+)\.php$}) { |m| "test/#{m[1]}Test.php" }
end