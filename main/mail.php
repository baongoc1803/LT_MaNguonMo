e debugger to obtain the optimizations
            # so, skipped it for now (note: the actual benchmarks time was in the
            # margin of a 0-1% improvement, which is probably not worth it for
            # speed increments).
            # extra_compile_args = ["-flto", "-fprofile-generate"]
            # ... Run benchmarks ...
            # extra_compile_args = ["-flto", "-fprofile-use", "-fprofile-correction"]
        elif "win32" in sys.platform:
            pass
            # uncomment to generate pdbs for visual studio.
            # extra_compile_args=["-Zi", "/Od"]
            # extra_link_args=["-debug"]
            if IS_PY311_ONWARDS:
                # On py311 we need to add the CPython include folder to the include path.
                extra_compile_args.append("-I%s\\include\\CPython" % sys.exec_prefix)

        kwargs = {}
        if extra_link_args:
            kwargs["extra_link_args"] = extra_link_args
        if extra_compile_args:
            kwargs["extra_compile_args"] = extra_compile_args

        ext_modules = [
            Extension(
                "%s%s.%s"
                % (
                    dir_name,
                    "_ext" if extended else "",
                    target_pydevd_name,
                ),
                c_files,
                **kwargs,
            )
        ]

        # This is needed in CPython 3.8 to be able to include internal/pycore_pystate.h
        # (needed to set PyInterpreterState.eval_frame).
        for module in ext_modules:
            module.define_macros = [("Py_BUILD_CORE_MODULE", "1")]
        setup(name="Cythonize", ext_modules=ext_modules)
    finally:
        if target_pydevd_name != extension_name:
            try:
                os.remove(new_pyx_file)
            except:
                import traceback

                traceback.print_exc()
            try:
                os.remove(new_c_file)
            except:
                import traceback

                traceback.print_exc()
            if has_pxd:
                try:
                   